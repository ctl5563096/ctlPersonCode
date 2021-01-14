<?php declare(strict_types=1);


namespace Ctl\Helper;

require __DIR__ . '/../TraitClass/Singletons.php';

use Ctl\TraitClass\Singletons;

/**
 * 设计模型助手类 简单封装单例redis
 *
 * Class DesignModelHelper
 * @package Ctl\Helper
 */
class DesignModelHelper
{
    use Singletons;

    private $_obj;

    public function __construct()
    {
        $this->_obj = new \Redis();
        $this->_obj->pconnect("127.0.0.1",6379);
    }

    /**
     * Notes: 获取redis的单例模式
     *
     * Author: chentulin
     * DateTime: 2021/1/14 17:47
     * E-MAIL: <chentulinys@163.com>
     */
    public function getRedisObj()
    {
        return $this->_obj;
    }
}