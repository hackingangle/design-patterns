<?php namespace DesignPatterns\Creational\AbstractFactory;

class Picture implements MediaInterface
{
    public function render()
    {
        return 'picture';
    }
}
