<?php
//
//namespace App;
//
//use Exception;
//use GuzzleHttp\Exception\GuzzleException;
//
//class RandomCategoryCat extends RandomCat
//{
//    protected int $categoryId;
//    private array $categories;
//
//    public function __construct(string $categoryId)
//    {
//        if (!is_numeric($_GET['categoryId'])) {
//            throw new Exception("Parameter \"categoryId\"={$_GET['categoryId']} is not a numeric");
//        }
//
//        parent::__construct();
//
//        $this->categoryId = $categoryId;
//
//        $this->categories = json_decode($this->getCategories());
//    }
//
//    /**
//     * @throws GuzzleException
//     * @throws Exception
//     */
//    public function getCat(): string
//    {
//        $uri = $this->uri . '?category_ids=' . $this->categoryId;
//
//        return $this->guzzleClient->getContents($uri);
//    }
//
//    public function getCategories(): string
//    {
//        $uri = '/v1/categories';
//
//        try {
//            return $this->guzzleClient->getContents($uri);
//        } catch (GuzzleException $e) {
//            return $e->getMessage();
//        }
//    }
//
//    public function getCategory()
//    {
//        $categoryName = "";
//
//        foreach ($this->categories as $category) {
//            switch ($this->categoryId) {
//                case $category->id:
//                    $categoryName = $category->name;
//            }
//        }
//
//        if ($categoryName === "") {
//            throw new Exception("Invalid category: \"categoryId\"=$this->categoryId not exists");
//        }
//
//        return $categoryName;
//    }
//}
