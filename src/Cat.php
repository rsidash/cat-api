<?php

namespace App;

use Exception;
use GuzzleClient\GuzzleClient;

abstract class Cat extends Animal
{
    protected GuzzleClient $guzzleClient;

    public abstract function getAnimal(): string;

    public function __construct()
    {
        $this->guzzleClient = new GuzzleClient();
    }

    /**
     * @throws Exception
     */
    public function getImageURL(): string
    {
        $contents = $this->getAnimal();

        if ($contents === '[]' || is_null($contents)) {
            throw new Exception('Cat image not exists');
        }

        return json_decode($contents)[0]->url;
    }
}
