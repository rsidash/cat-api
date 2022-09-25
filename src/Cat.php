<?php

namespace App;

use GuzzleClient\GuzzleClient;

abstract class Cat extends Animal
{
    protected GuzzleClient $guzzleClient;

    public abstract function getAnimal(): string;

    public function __construct()
    {
        $this->guzzleClient = new GuzzleClient();
    }
}
