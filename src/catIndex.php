<?php

require 'vendor/autoload.php';

use App\Cat;
use GuzzleHttp\Exception\GuzzleException;

function getCatImageURL(): string
{
    $cat = new Cat();

    try {
        return $cat->getCatImageURL();
    } catch (Exception|GuzzleException $e) {
        echo $e;
        return "";
    }
}
