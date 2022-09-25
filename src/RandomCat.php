<?php

namespace App;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

class RandomCat extends Cat
{
    protected string $uri = '/v1/images/search';
    protected int $categoryId;
    private array $categories;

    public function __construct(int $categoryId = 0)
    {
        parent::__construct();

        $this->categoryId = $categoryId;

        $this->categories = json_decode($this->getCategories());
    }

    /**
     * @throws GuzzleException
     */
    public function getCat(): string
    {
        return $this->guzzleClient->getContents($this->uri);
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getCategoryCat(): string
    {
        $uri = $this->uri . '?category_ids=' . $this->categoryId;

        return $this->guzzleClient->getContents($uri);
    }

    public function getCategories(): string
    {
        $uri = '/v1/categories';

        try {
            return $this->guzzleClient->getContents($uri);
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }
    }

    public function getCategory()
    {
        $categoryName = "";

        foreach ($this->categories as $category) {
            switch ($this->categoryId) {
                case $category->id:
                    $categoryName = $category->name;
            }
        }

        if ($categoryName === "") {
            throw new Exception("Invalid category: \"categoryId\"=$this->categoryId not exists");
        }

        return $categoryName;
    }
}
