<?php

namespace App;

use Exception;

abstract class Cat implements ImageInterface
{
    public abstract function getCat(): string;

    /**
     * @throws Exception
     */
    public function getImageURL(): string
    {
        if ($this->getCat() === '[]' || is_null($this->getCat())) {
            throw new Exception('Cat image not exists');
        }

        return json_decode($this->getCat())[0]->url;
    }
}
