<?php

namespace Template;

use App\ImageInterface;
use TemplateTag\HTMLTemplateBasicHeader;
use TemplateTag\HTMLTemplateContainer;
use TemplateTag\HTMLTemplateHeader;
use TemplateTag\HTMLTemplateImage;

class HTMLTemplate
{
    public function getHTMLTemplate(ImageInterface $object, array $text): string
    {
        $container = new HTMLTemplateContainer();
        $header = new HTMLTemplateHeader();
        $image = new HTMLTemplateImage();

        $content = $header->getHeaderTag($text['header']) . $image->getImageTag($object, $text['alt']);

        return $container->getContainer($content);
    }

    public function getBasicHeaderHTMLTemplate(string $text): string
    {
        $container = new HTMLTemplateContainer();
        $header = new HTMLTemplateBasicHeader();

        $content = $header->getHeaderTag($text);

        return $container->getContainer($content);
    }
}