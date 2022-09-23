<?php

namespace App;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

class Cat
{
    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getCat(): string
    {
        if (isset($_GET['categoryId'])) {
            $categoryId = $_GET['categoryId'];

            if (!is_numeric($categoryId)) {
                throw new Exception('Category not a numeric');
            }

            return $this->getCatByCategory($categoryId);
        }

        return $this->getRandomCat();
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getCatByCategory(int $categoryId): string
    {
        $uri = '/v1/images/search?category_ids=' . $categoryId;

        return getContents($uri);
    }

    /**
     * @throws GuzzleException
     */
    public function getRandomCat(): string
    {
        $uri = '/v1/images/search';

        return getContents($uri);
    }

    /**
     * @throws GuzzleException
     */
    public function getCatImageURL(): string
    {
        return json_decode($this->getCat())[0]->url;
    }
}