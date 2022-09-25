<?php

namespace TemplateTag;

class HTMLTemplateHeader
{
    public function getHeaderTag(string $header, int $headerType = 1): string
    {
        return "<h{$headerType}>{$header}</h{$headerType}>";
    }
}