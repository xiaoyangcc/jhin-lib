<?php
/**
 * Created by PhpStorm
 * User: Jhinwy
 * Date: 6/28/21
 * Time: 2:26 PM
 */

/**
 * 获得数组的中所有的组合
 */
if (!function_exists('combination')) {
    function combination($array, $length)
    {
        $result = [];
        //取出数据要求总长度不符合 则直接返回空数组
        $number = count($array);
        if ($length <= 0 || $length > $number) {

            return $result;
        }
        //循环开始
        foreach ($array as $key => $value) {
            $temp = [$value];
            if ($length == 1) { //如果长度为了 则直接返回所有数据单个值组成的数组
                $result[] = $temp;
            } else {
                //从当前值开始向后截取数组
                $less  = array_slice($array, $key + 1);
                $small = combination($less, $length - 1);
                foreach ($small as $smallValue) {
                    $result[] = array_merge($temp, $smallValue);
                }
            }
        }

        return $result;
    }
}


/**
 * 获得数组的中所有的排列
 */
if (!function_exists('arrangement')) {
    function arrangement($array, $length)
    {
        $result = [];
        $n      = count($array);
        if ($length <= 0 || $length > $n) {
            return $result;
        }
        for ($i = 0; $i < $n; $i++) {
            $b = $array;
            $t = array_splice($b, $i, 1);
            if ($length == 1) {
                $result[] = $t;
            } else {
                $c = arrangement($b, $length - 1);
                foreach ($c as $v) {
                    $result[] = array_merge($t, $v);
                }
            }
        }

        return $result;
    }
}
