<?php
use DesignPatterns\Creational\AbstractFactory\HtmlFactory;

class HtmlFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testRenderPicture()
    {
        $type = 'picture';
        $media = HtmlFactory::getInstance($type);
        $this->assertEquals($type, $media->render());
    }

    public function testRenderText()
    {
        $type = 'text';
        $media = HtmlFactory::getInstance($type);
        $this->assertEquals($type, $media->render());
    }
}
