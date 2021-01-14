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
    public function recursionSortHelper(array $arrVar, string $pidStr, string $mainIdStr, string $childrenStr = '_child')
    {
        // 前置判断
        if (!is_array($arrVar) || count($arrVar) === 0) {
            return false;
        }
        return $this->recursionSortMain($arrVar, $pidStr, $mainIdStr, $childrenStr);
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
    public function recursionSortMain(array $arrVar, string $pidStr, string $mainIdStr, string $childrenStr, int $pid = 0): array
    {
        $newArr = [];
        foreach ($arrVar as $v) {
            if ($v[$pidStr] === $pid) {
                $v[$childrenStr] = $this->recursionSortMain($arrVar, $pidStr, $mainIdStr, $childrenStr, $v[$mainIdStr]);
                if ($v[$childrenStr] == null) {
                    unset($v[$childrenStr]);             //如果子元素为空则unset()进行删除，说明已经到该分支的最后一个元素了（可选）
                }
                $newArr[] = $v;                           //将记录存入新数组
            }
        }
        return $newArr;
    }

    /**
     * Notes: 快速排序
     *
     * Author: chentulin
     * DateTime: 2021/1/13 16:54
     * E-MAIL: <chentulinys@163.com>
     * @param array $arrVar
     * @return array|bool
     */
    public function quickSortHelper(array $arrVar)
    {
        // 前置判断 1个元素没必要判断
        if (!is_array($arrVar)) {
            return false;
        }
        // 如果长度为1返回当前值
        if (count($arrVar) <= 1) return $arrVar;
        $length = count($arrVar);
        $right  = $left = [];
        for ($i = 1; $i < $length; $i++) {
            //判断当前元素的大小
            if ($arrVar[$i] < $arrVar[0]) {
                $left[] = $arrVar[$i];
            } else {
                $right[] = $arrVar[$i];
            }
        }
        //递归调用
        $left  = $this->quickSortHelper($left);
        $right = $this->quickSortHelper($right);
        //将所有的结果合并
        return array_merge($left, [$arrVar[0]], $right);
    }

    /**
     * Notes: 冒泡排序
     *
     * Author: chentulin
     * DateTime: 2021/1/13 17:22
     * E-MAIL: <chentulinys@163.com>
     * @param array $arrVar
     * @return array
     */
    public function bubblesSortHelper(array $arrVar): array
    {
        $len = count($arrVar);
        for ($i = 0; $i < $len - 1; $i++) {
            for ($j = 0; $j < $len - $i - 1; $j++) {
                if ($arrVar[$j] > $arrVar[$j + 1]) {
                    $tmp            = $arrVar[$j];
                    $arrVar[$j]     = $arrVar[$j + 1];
                    $arrVar[$j + 1] = $tmp;
                }
            }
        }
        return $arrVar;
    }
}