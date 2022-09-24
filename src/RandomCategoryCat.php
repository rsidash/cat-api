<?php

namespace App;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

class RandomCategoryCat extends RandomCat
{
    protected int $categoryId;

    public function __construct()
    {
        if (!is_numeric($_GET['categoryId'])) {
            throw new Exception("Parameter \"categoryId\"={$_GET['categoryId']} is not a numeric");
        }

        $this->categoryId = $_GET['categoryId'];
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getCat(): string
    {
        $uri = '/v1/images/search?category_ids=' . $this->categoryId;

        return getContents($uri);
    }

    public function getCategory(): string
    {
        switch ($this->categoryId) {
            case 1:
                return 'hats';
            case 2:
                return 'space';
            case 4:
                return 'sunglasses';
            case 5:
                return 'boxes';
            case 7:
                return 'ties';
            case 14:
                return 'sinks';
            case 15:
                return 'clothes';
            default:
                throw new Exception("Invalid category: \"categoryId\"=$this->categoryId not exists");
        }
    }
}
