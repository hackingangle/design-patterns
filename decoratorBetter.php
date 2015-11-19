<?php
/**
 * Decorator-装饰者
 */

/**
 * 接口
 */
interface SellerService
{
    /**
     * 计算总价
     * @return integer 总价
     */
    public function getTotalCost();
}

/**
 * 基础类,要被加工
 */
class Seller implements SellerService
{
    /**
     * 基础价格
     * @var integer
     */
    const BASE_PRICE = 10;

    /**
     * 计算总价
     * @return integer 总价
     */
    public function getTotalCost()
    {
        return self::BASE_PRICE;
    }
}

/**
 * 装饰类抽象
 */
abstract class ModifySeller implements SellerService
{
    /**
     * 聚合的对象
     * @var SellerService
     */
    private $sellerServiceObj;

    /**
     * 变化的价格
     * @var integer
     */
    protected $modifiedPrice;

    /**
     * 构造
     * @param SellerService $sellerServiceObj 聚合对象
     */
    public function __construct(SellerService $sellerServiceObj)
    {
        $this->sellerServiceObj = $sellerServiceObj;
    }

    /**
     * 计算总价
     * @return integer 总价
     */
    public function getTotalCost()
    {
        return $this->sellerServiceObj->getTotalCost() + $this->modifiedPrice;
    }
}

/**
 * 加工后类,聚合并实现了接口
 */
class UpSeller extends ModifySeller
{
    protected $modifiedPrice = 90;
}

/**
 * 加工后类,聚合并实现了接口
 */
class DownSeller extends ModifySeller
{
    protected $modifiedPrice = -90;
}

/**
 * 基础价格
 */
var_dump((new Seller)->getTotalCost());
/**
 * 涨价一次
 */
var_dump((new UpSeller(new Seller))->getTotalCost());
/**
 * 涨价二次
 */
var_dump((new UpSeller(new UpSeller(new Seller)))->getTotalCost());
/**
 * 涨价一次，减价一次
 */
var_dump((new DownSeller(new UpSeller(new Seller)))->getTotalCost());
