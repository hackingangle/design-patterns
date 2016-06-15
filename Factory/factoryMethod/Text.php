<?php namespace DesignPatterns\Creational\FactoryMethod;
class Text implements MediaInterface
{
    public function render()
    {
        var_dump('text render...');
    }
}
