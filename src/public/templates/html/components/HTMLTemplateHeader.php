<?php

namespace TemplateTag;

class HTMLTemplateHeader
{
    public function getHeaderTag(string $header, int $headerType): string
    {
        return "<h{$headerType}>{$header}</{$headerType}>";
    }
}