<?php

namespace Template;

use App\ImageInterface;
use TemplateTag\HTMLTemplateContainer;
use TemplateTag\HTMLTemplateHeader;
use TemplateTag\HTMLTemplateImage;

class HTMLTemplate
{
    protected HTMLTemplateContainer $container;
    protected HTMLTemplateHeader $header;

    public function __construct()
    {
        $this->container = new HTMLTemplateContainer();
        $this->header = new HTMLTemplateHeader();
    }

    public function getHTMLTemplate(ImageInterface $object, array $text): string
    {
        $image = new HTMLTemplateImage();

        $header = $this->header->getHeaderTag($text['header'], 3) . ":";

        $content = $header . $image->getImageTag($object, $text['alt']);

        return $this->container->getContainer($content);
    }

    public function getBasicHeaderHTMLTemplate(string $text): string
    {
        $content = $this->header->getHeaderTag($text, 1);

        return $this->container->getContainer($content);
    }
}