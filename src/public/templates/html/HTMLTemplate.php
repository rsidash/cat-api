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

        $headerText = $text['header'] . ":";
        $header = $this->header->getHeaderTag($headerText, 3);

        $content = $header . $image->getImageTag($object, $text['alt']);

        return $this->container->getContainer($content);
    }

    public function getBasicHeaderHTMLTemplate(string $text): string
    {
        $content = $this->header->getHeaderTag($text, 1);

        return $this->container->getContainer($content);
    }
}