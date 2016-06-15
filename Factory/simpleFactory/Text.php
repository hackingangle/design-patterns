<?php namespace DesignPatterns\Creational\AbstractFactory;

class Text implements MediaInterface
{
    public function render()
    {
        return 'text';
    }
}
