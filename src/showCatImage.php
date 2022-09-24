<?php

require 'vendor/autoload.php';

use App\RandomCategoryCat;
use App\RandomCat;
use Template\HTMLTemplate;

try {
    if (isset($_GET['categoryId'])) {

        $cat = new RandomCategoryCat();
        $category = $cat->getCategory();

        $text = array(
            'header' => "Random cat from {$category} category",
            'alt' => "this is a random cat image from {$category} category"
        );
    } else {
        $cat = new RandomCat();

        $text = array(
            'header' => 'Random cat image',
            'alt' => 'this is a random cat image'
        );
    }

    $htmlTemplate = new HTMLTemplate();
    echo $htmlTemplate->getHTMLTemplate($cat, $text);

} catch (Exception $e) {
    echo $e->getMessage();
    die;
}
