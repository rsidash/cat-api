<?php

require 'vendor/autoload.php';

use App\Cat;
use GuzzleHttp\Exception\GuzzleException;

function getImageURL(): string
{
    $cat = new Cat();

    try {
        return $cat->getCatImageURL();
    } catch (Exception|GuzzleException $e) {
        return $e->getMessage();
    }
}
