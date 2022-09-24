<?php

require 'vendor/autoload.php';

use App\RandomCategoryCat;
use App\RandomCat;

if (isset($_GET['categoryId'])) {
    try {
        $cat = new RandomCategoryCat();
        $category = $cat->getCategory();

        $text = array(
            'header' => "Random cat from {$category} category",
            'alt' => "this is a random cat image from {$category} category"
        );
    } catch (Exception $e) {
        echo $e->getMessage();
        die;
    }
} else {
    $cat = new RandomCat();

    $text = array(
        'header' => 'Random cat image',
        'alt' => 'this is a random cat image'
    );
}

echo formatHTMLTemplate($cat, $text);
