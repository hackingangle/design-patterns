<?php namespace DesignPatterns\Creational\FactoryMethod;

use DesignPatterns\Creational\FactoryMethod\Picture;
use DesignPatterns\Creational\FactoryMethod\Text;

class MediaFactory implements FactoryInterface
{
    protected $arrType;

    public function __construct()
    {
        $this->arrType = [
            'picture',
            'text',
        ];
    }
    public function getInstance($type)
    {
        if (!in_array($type, $this->arrType)) {
            throw new Exception("unsupported type.", -1);
        }
        if ($type == 'picture') {
            return new Picture();
        }
        if ($type == 'text') {
            return new Text();
        }
    }
}
