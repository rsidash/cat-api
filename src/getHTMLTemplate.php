<?php

use App\ImageInterface;

function formatHTMLTemplate(ImageInterface $object, array $text): string
{
    try {
        $imageURL = $object->getImageURL();
        return
            "<b>{$text['header']}:</b>
            <br>
            <img src=\"{$imageURL}\" alt=\"{$text['alt']}\"/>";
    } catch (Exception $e) {
        return $e->getMessage();
    }
}