<?php

namespace App;

use Exception;

abstract class Animal
{
    public abstract function getAnimal(): string;

    /**
     * @throws Exception
     */
    public function getImageURL(): string
    {
        $contents = $this->getAnimal();

        if ($contents === '[]') {
            throw new Exception("Image not exists");
        }

        return json_decode($contents)[0]->url;
    }
}