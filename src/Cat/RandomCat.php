<?php

namespace App\Cat;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

class RandomCat extends Cat
{
    protected string $uri = '/v1/images/search';
    protected int $categoryId;
    private array $categories;

    /**
     * @throws GuzzleException
     */
    public function __construct(int $categoryId = 0)
    {
        parent::__construct();

        $this->categoryId = $categoryId;

        $this->categories = json_decode($this->getCategories());
    }

    public function getAnimal(): string
    {
        try {
            if ($this->categoryId) {
                return $this->getRandomCategoryCat($this->categoryId);
            }
            return $this->getRandomCat();
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @throws GuzzleException
     */
    public function getRandomCat(): string
    {
        return $this->guzzleClient->getContents($this->uri);
    }

    /**
     * @throws GuzzleException
     */
    public function getRandomCategoryCat(string $categoryId): string
    {
        $uri = $this->uri . '?category_ids=' . $categoryId;

        return $this->guzzleClient->getContents($uri);
    }

    /**
     * @throws GuzzleException
     */
    public function getCategories(): string
    {
        $uri = '/v1/categories';

        return $this->guzzleClient->getContents($uri);
    }

    /**
     * @throws Exception
     */
    public function getCategory(): string
    {
        $categoryName = "";

        foreach ($this->categories as $category) {
            if ($this->categoryId == $category->id) {
                $categoryName = $category->name;
            }
        }

        if ($categoryName === "") {
            throw new Exception("Invalid category: \"categoryId\"=$this->categoryId not exists");
        }

        return $categoryName;
    }
}
