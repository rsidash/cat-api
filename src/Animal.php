<?php


namespace App;


abstract class Animal implements ImageInterface
{
    public abstract function getAnimal(): string;
}