<?php

require 'vendor/autoload.php';

use App\Cat;
use GuzzleHttp\Exception\GuzzleException;

function formatHTMLTemplate(): string
{
    $cat = new Cat();

    try {
        $imageURL = $cat->getCatImageURL();
        return
            "<b>Cat image:</b>
            <br>
            <img src=\"{$imageURL}\" alt=\"\"/>";
    } catch (Exception $e) {
        return $e->getMessage();
    }
}