<?php

namespace TemplateTag;

use App\ImageInterface;

class HTMLTemplateImage
{
    public function getImageTag(string $url, string $alt): string
    {
        return "<img src=\"{$url}\" alt=\"{$alt}\">";
    }
}