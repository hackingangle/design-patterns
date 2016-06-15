<?php namespace DesignPatterns\Creational\AbstractFactory;

class HtmlFactory
{
    public static function getInstance($type)
    {
        switch ($type) {
            case 'picture':
                return new Picture();
                break;
            case 'text':
                return new Text();
                break;
            default:
                throw new Exception("The unsupported type.", -1);
                break;
        }
    }
}
