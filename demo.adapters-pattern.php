<?php
/**
 * Adapters-适配器
 */

/**
 * 纸质书接口
 */
interface BookReader
{
    /**
     * 打开书
     */
    public function openBook();

    /**
     * 翻页
     */
    public function turnOnPage();
}

/**
 * 电子书接口
 */
interface EBookReader
{
    /**
     * 开机
     */
    public function startBook();

    /**
     * 下一页
     */
    public function nextPage();
}

/**
 * 纸质书
 */
class Book implements BookReader
{
    /**
     * 打开书
     */
    public function openBook()
    {
        var_dump("打开书...");
    }

    /**
     * 翻页
     */
    public function turnOnPage()
    {
        var_dump("翻页到昨天书签...");
    }
}

/**
 * Kindle
 */
class Kindle implements EBookReader
{
    /**
     * 开机
     */
    public function startBook()
    {
        var_dump("Kindle开机中...");
    }

    /**
     * 下一页
     */
    public function nextPage()
    {
        var_dump("Kindle下一页...");
    }
}

class KindleAdapter implements BookReader
{
    /**
     * 电子书接口
     * @var EBookReader
     */
    private $eBookReader;

    /**
     * 构造
     * @param EBookReader $eBookReader 电子书对象
     */
    public function __construct(EBookReader $eBookReader)
    {
        $this->eBookReader = $eBookReader;
    }

    /**
     * 打开书
     */
    public function openBook()
    {
        $this->eBookReader->startBook();
    }

    /**
     * 翻页
     */
    public function turnOnPage()
    {
        $this->eBookReader->nextPage();
    }
}

/**
 * 使用者
 */
class Student
{
    /**
     * 纸质书接口
     * @var BookReader
     */
    private $bookReader;

    /**
     * 构造
     * @param BookReader $bookReader 纸质书对象
     */
    public function __construct(BookReader $bookReader)
    {
        $this->bookReader = $bookReader;
    }

    /**
     * 看书
     * @return null
     */
    public function read()
    {
        $this->bookReader->openBook();
        $this->bookReader->turnOnPage();
    }
}

$bookReader = new Book;
$student = new Student($bookReader);
$student->read();

$studentRich = new Student(new KindleAdapter(new Kindle()));
$studentRich->read();
