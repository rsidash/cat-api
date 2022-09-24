<?php

namespace TemplateTag;

class HTMLTemplateContainer
{
    public function getContainer(string $content): string
    {
        return "<div align='center'>{$content}</div>";
    }
}