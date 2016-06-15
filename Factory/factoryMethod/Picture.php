<?php namespace DesignPatterns\Creational\FactoryMethod;
class Picture implements MediaInterface
{
    public function render()
    {
        var_dump('picture render...');
    }
}
