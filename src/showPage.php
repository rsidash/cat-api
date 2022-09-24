<?php

require 'vendor/autoload.php';

use App\RandomCategoryCat;
use App\RandomCat;
use Template\HTMLTemplate;

if (!isset($_GET['entity'])) {
    echo 'Entity not chosen';
    die;
}

switch($_GET['entity']) {
    case 'cats':
        showCat();
        break;
    case 'dogs':
        showDog();
        break;
    default:
        echo 'Invalid entity. Please choose cats or dogs';
}

function showCat() {
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
    }
}

function showDog() {
    // TODO: implement DOGS class
    $text = 'WORK IN PROGRESS';

    $htmlTemplate = new HTMLTemplate();
    echo $htmlTemplate->getBasicHeaderHTMLTemplate($text);
}