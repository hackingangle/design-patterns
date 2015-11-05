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
 * 加工后类,聚合并实现了接口
 */
class UpSeller implements SellerService
{
    /**
     * 聚合的对象
     * @var SellerService
     */
    private $sellerServiceObj;

    /**
     * 增加价格
     * @var integer
     */
    const BASE_PRICE_ADD = 90;

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
        return $this->sellerServiceObj->getTotalCost() + self::BASE_PRICE_ADD;
    }
}

/**
 * 加工后类,聚合并实现了接口
 */
class DownSeller implements SellerService
{
    /**
     * 聚合的对象
     * @var SellerService
     */
    
    private $sellerServiceObj;
    /**
     * 减少价格
     * @var integer
     */
    const BASE_PRICE_MINUS = -90;

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
        return $this->sellerServiceObj->getTotalCost() + self::BASE_PRICE_MINUS;
    }
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
