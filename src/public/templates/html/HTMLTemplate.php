<?php

namespace Template;

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

    public function getImageHTMLTemplate(string $url, array $text): string
    {
        $image = new HTMLTemplateImage();

        if ($text['header'] === "") {
            $headerText = "";
        } else {
            $headerText = $text['header'] . ":";
        }

        $header = $this->header->getHeaderTag($headerText, 3);

        $content = $header . $image->getImageTag($url, $text['alt']);

        return $this->container->getContainer($content);
    }

    public function getBasicHeaderHTMLTemplate(string $text): string
    {
        $content = $this->header->getHeaderTag($text);

        return $this->container->getContainer($content);
    }

    public function getErrorTemplate(string $message): string
    {
        $content = $this->header->getHeaderTag($message);

        return $this->container->getContainer($content);
    }
}