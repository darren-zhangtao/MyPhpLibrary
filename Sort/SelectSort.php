<?php
/**
 * Created by IntelliJ IDEA.
 * User: tt
 * Date: 19-2-20
 * Time: 下午7:59
 */

namespace Sort;


class SelectSort
{
    public static function selectSort($arr) {
        $size = count($arr);

        for ($i = 0; $i < $size-1; $i ++) {
            $small = $i;
            for ($j = $i+1; $j < $size; $j ++) {
                if ($arr[$j] < $arr[$small]) {
                    $small = $j;
                }
            }
            if ($small != $i) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$small];
                $arr[$small] = $temp;
            }
        }
        return $arr;
    }
}