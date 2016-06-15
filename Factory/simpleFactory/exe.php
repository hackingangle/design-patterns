<?php 
require './vendor/autoload.php';
use DesignPatterns\Creational\AbstractFactory\HtmlFactory;

$mediaType = 'text';
$media = HtmlFactory::getInstance($mediaType);
$media->render();
