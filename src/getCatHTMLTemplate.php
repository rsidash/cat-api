<?php

require 'vendor/autoload.php';

use App\Cat;

$cat = new Cat();

$text = array(
    'header' => 'Cat image',
    'alt' => 'this is a cat image'
);

echo formatHTMLTemplate($cat, $text);