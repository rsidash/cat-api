<?php

namespace App;

use Exception;
use GuzzleClient\GuzzleClient;

abstract class Cat implements ImageInterface
{
    protected GuzzleClient $guzzleClient;

    public abstract function getCat(): string;

    public function __construct()
    {
        $this->guzzleClient = new GuzzleClient();
    }

    /**
     * @throws Exception
     */
    public function getImageURL(): string
    {
        $contents = $this->getCat();

        if ($contents === '[]' || is_null($contents)) {
            throw new Exception('Cat image not exists');
        }

        return json_decode($contents)[0]->url;
    }
}
