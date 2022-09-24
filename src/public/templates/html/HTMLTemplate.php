<?php

namespace Template;

use App\ImageInterface;
use TemplateTag\HTMLTemplateBasicHeader;
use TemplateTag\HTMLTemplateContainer;
use TemplateTag\HTMLTemplateHeader;
use TemplateTag\HTMLTemplateImage;

class HTMLTemplate
{
    protected HTMLTemplateContainer $container;

    public function __construct()
    {
        $this->container = new HTMLTemplateContainer();
    }

    public function getHTMLTemplate(ImageInterface $object, array $text): string
    {
        $header = new HTMLTemplateHeader();
        $image = new HTMLTemplateImage();

        $content = $header->getHeaderTag($text['header']) . $image->getImageTag($object, $text['alt']);

        return $this->container->getContainer($content);
    }

    public function getBasicHeaderHTMLTemplate(string $text): string
    {
        $header = new HTMLTemplateBasicHeader();

        $content = $header->getHeaderTag($text);

        return $this->container->getContainer($content);
    }
}