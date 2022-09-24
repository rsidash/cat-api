<?php

namespace TemplateTag;

class HTMLTemplateBasicHeader
{
    public function getHeaderTag(string $header): string
    {
        return "<h1>{$header}</h1>";
    }
}