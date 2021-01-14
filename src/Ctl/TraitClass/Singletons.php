<?php declare(strict_types=1);

namespace Ctl\TraitClass;

/**
 * 返回一个单例对象
 *
 * Trait Singletons
 * @package Ctl\TraitClass
 */
trait Singletons
{
    /**
     * @var $_instance
     */
    private static $_instance;

    /**
     * Notes:
     * Author: chentulin
     * DateTime: 2021/1/14 17:04
     * E-MAIL: <chentulinys@163.com>
     * @return static
     *
     * 返回实例化的单例对象:
     * 过程:判断这个静态变量是否已经被实例化过对象进行赋值 如果没有被实例化过对象赋值
     */
    public static function getInstance()
    {
        if(!isset(self::$_instance)){
            self::$_instance = new static(); // 这里要分清new self 和 new static的区别 new static 延迟静态绑定 延迟到子类
        }
        return self::$_instance;
    }
}