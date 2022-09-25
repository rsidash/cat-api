<?php


namespace App;


class Dog implements ImageInterface
{
    public function getDog()
    {
        // TODO: Implement getDog() method.
        return "TODO: Implement work with Dogs";
    }

    public function getImageURL(): string
    {
        // TODO: Implement getImageURL() method.
        return $this->getDog();
    }
}