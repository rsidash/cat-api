<?php

namespace TemplateTag;

class HTMLTemplateHeader
{
    public function getHeaderTag(string $header): string
    {
        return "<h2>{$header}:</h2>";
    }
}