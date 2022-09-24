<?php

namespace Template;

use App\ImageInterface;
use TemplateTag\HTMLTemplateHeader;
use TemplateTag\HTMLTemplateImage;

class HTMLTemplate
{
    public function getHTMLTemplate(ImageInterface $object, array $text): string
    {
        $header = new HTMLTemplateHeader();
        $image = new HTMLTemplateImage();

        return $header->getHeaderTag($text['header']) . $image->getImageTag($object, $text['alt']);
    }
}