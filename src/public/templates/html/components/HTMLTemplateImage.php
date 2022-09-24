<?php

namespace TemplateTag;

use App\ImageInterface;

class HTMLTemplateImage
{
    public function getImageTag(ImageInterface $object, string $alt): string
    {
        $imageURL = $object->getImageURL();

        return "<img src={$imageURL} alt={$alt}";
    }
}