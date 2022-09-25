<?php

namespace App;

class Dog extends Animal
{
    public function getDog()
    {
        // TODO: Implement getDog() method.
        return "TODO: Implement work with Dogs";
    }

    public function getImageURL(): string
    {
        // TODO: Implement getImageURL() method.
        return $this->getAnimal();
    }

    public function getAnimal(): string
    {
        // TODO: Implement getAnimal() method.
        return $this->getDog();
    }
}