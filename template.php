<?php
/**
 * 模板模型
 */


/**
 * 面条
 */
abstract class Noodle
{
    /**
     * 做面
     */
    final public function cook()
    {
        $this->addWater();
        $this->addSalt();
        $this->addOthers();
    }

    /**
     * 加盐
     */
    public function addSalt()
    {
        var_dump('加盐...');
    }

    /**
     * 加水
     */
    public function addWater()
    {
        var_dump('加水...');
    }

    abstract public function addOthers();
}

/**
 * 鸡蛋面
 */
class EggNoodle extends Noodle
{
    public function addOthers()
    {
        var_dump('加鸡蛋...');
    }
}

/**
 * 素面 
 */
class VegeNoodle extends Noodle
{
    public function addOthers()
    {
        var_dump('加蔬菜...');
    }
}

$eggNoodle = new EggNoodle;
$eggNoodle->cook();

$vegeNoodle = new VegeNoodle;
$vegeNoodle->cook();
