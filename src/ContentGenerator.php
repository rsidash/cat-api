<?php

namespace App;

use Exception;
use Template\HTMLTemplate;

class ContentGenerator
{
    private string $entityKey;
    private HTMLTemplate $htmlTemplate;

    public function __construct(string $entityKey)
    {
        $this->entityKey = $entityKey;
        $this->htmlTemplate = new HTMLTemplate();
    }

    public function generateContent(): void
    {
        switch($this->entityKey) {
            case 'cats':
                $this->showCat();
                break;
            case 'dogs':
                $this->showDog();
                break;
            default:
                $this->showError('Invalid entity. Please choose cats or dogs');
        }
    }

    public function showCat(): void
    {
        try {
            if (isset($_GET['categoryId'])) {

                $cat = new RandomCategoryCat($_GET['categoryId']);
                $category = $cat->getCategory();

                $text = array(
                    'header' => "Random cat from {$category} category",
                    'alt' => "this is a random cat image from {$category} category"
                );
            } else {
                $cat = new RandomCat();

                $text = array(
                    'header' => 'Random cat image',
                    'alt' => 'this is a random cat image'
                );
            }

            echo $this->htmlTemplate->getImageHTMLTemplate($cat, $text);

        } catch (Exception $e) {
            $this->showError($e->getMessage());
        }
    }

    public function showDog(): void
    {
        // TODO: Implement work with Dogs
        $header = 'WORK STILL IN PROGRESS';
        $text = array(
            'header' => '',
            'alt' => 'this is a dog image'
        );

        $dog = new Dog();

        echo $this->htmlTemplate->getBasicHeaderHTMLTemplate($header);
        echo $this->htmlTemplate->getImageHTMLTemplate($dog, $text);
    }

    public function showError(string $message): void
    {
        echo $this->htmlTemplate->getErrorTemplate($message);
    }
}
