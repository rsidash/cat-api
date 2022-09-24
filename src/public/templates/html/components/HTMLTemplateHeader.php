<?php

namespace TemplateTag;

class HTMLTemplateHeader extends HTMLTemplateBasicHeader
{
    public function getHeaderTag(string $header): string
    {
        return "<h2>{$header}:</h2>";
    }
}