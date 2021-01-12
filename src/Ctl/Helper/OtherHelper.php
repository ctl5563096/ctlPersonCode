<?php declare(strict_types=1);


namespace Ctl\Helper;

/**
 * 助手类 一些算法之类的
 *
 * Class OtherHelper
 * @package Ctl\Helper
 */
class OtherHelper
{
    /**
     * Notes: 递归助手
     *
     * Author: chentulin
     * DateTime: 2021/1/12 14:07
     * E-MAIL: <chentulinys@163.com>
     * @param array $arrVar
     * @param string $pidStr 排序的父Id
     * @param string $mainIdStr
     * @param string $childrenStr
     * @return bool|array
     */
    public function recursionSortHelper(array $arrVar, string $pidStr, string $mainIdStr , string $childrenStr = '_child')
    {
        // 前置判断
        if (!is_array($arrVar) || count($arrVar) === 0) {
            return false;
        }
        return $this->recursionSortMain($arrVar, $pidStr, $mainIdStr ,$childrenStr);
    }

    /**
     * Notes: 无限递归的主方法
     *
     * Author: chentulin
     * DateTime: 2021/1/12 14:29
     * E-MAIL: <chentulinys@163.com>
     * @param array $arrVar
     * @param string $pidStr 排序的父Id
     * @param string $mainIdStr 关联的Id
     * @param string $childrenStr
     * @param int $pid
     * @return array
     */
    public function recursionSortMain(array $arrVar, string $pidStr, string $mainIdStr, string $childrenStr,int $pid = 0): array
    {
        $newArr = [];
        foreach ($arrVar as $v) {
            if ($v[$pidStr] === $pid) {
                $v[$childrenStr] = $this->recursionSortMain($arrVar, $pidStr,$mainIdStr,$childrenStr,$v[$mainIdStr]);
                if ($v[$childrenStr] == null) {
                    unset($v[$childrenStr]);             //如果子元素为空则unset()进行删除，说明已经到该分支的最后一个元素了（可选）
                }
                $newArr[] = $v;                           //将记录存入新数组
            }
        }
        return $newArr;
    }
}