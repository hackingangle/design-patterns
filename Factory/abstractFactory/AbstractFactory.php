<?php
abstract class AbstractFactory
{
    abstract public function createText($content);
    abstract public function createPicutre($path, $name);
}
