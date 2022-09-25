<?php

namespace TemplateTag;

class HTMLTemplateImage
{
    public function getImageTag(string $url, string $alt): string
    {
        return "<img src=\"{$url}\" alt=\"{$alt}\">";
    }
}