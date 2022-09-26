<?php

namespace App;

use App\Cat\RandomCat;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Template\HTMLTemplate;

class ContentGenerator
{
    private string $entityKey;
    private HTMLTemplate $htmlTemplate;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->htmlTemplate = new HTMLTemplate();

        if (!isset($_GET['entity'])) {
            $this->showError('Entity is not set');
            die;
        }

        $this->entityKey = $_GET['entity'];
    }

    /**
     * @throws Exception
     */
    protected function checkEntitySet(): bool
    {
        if (!isset($_GET['entity'])) {
            $this->showError('Entity is not set');
            die;
        }

        return true;
    }

    public function generateContent(): void
    {
        switch ($this->entityKey) {
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

    protected function showCat(): void
    {
        try {
            if (isset($_GET['categoryId'])) {
                $categoryId = $_GET['categoryId'];

                if (!is_numeric($categoryId)) {
                    throw new Exception("Parameter \"categoryId\"={$categoryId} is not a numeric");
                }

                $cat = new RandomCat($categoryId);
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

            $url = $cat->getImageURL();
            echo $this->htmlTemplate->getImageHTMLTemplate($url, $text);

        } catch (Exception|GuzzleException $e) {
            $this->showError($e->getMessage());
        }
    }

    protected function showDog(): void
    {
        // TODO: Implement work with Dogs
        $header = 'WORK STILL IN PROGRESS';
        $text = array(
            'header' => '',
            'alt' => 'this is a dog image'
        );

        $dog = new Dog();
        try {
            $url = $dog->getImageURL();

            echo $this->htmlTemplate->getBasicHeaderHTMLTemplate($header);
            echo $this->htmlTemplate->getImageHTMLTemplate($url, $text);
        } catch (Exception $e) {
            $this->showError($e->getMessage());
        }
    }

    protected function showError(string $message): void
    {
        echo $this->htmlTemplate->getErrorTemplate($message);
    }
}
