<?php

namespace Sort;


class InsertSort
{
    public function insertSort($arr) {
        $size = count($arr);

        for ($i = 0; $i < $size-1; $i++) {
            $j = $i;
            $temp = $arr[$i+1];
            while ($j > -1 && $temp < $arr[$j]) {
                $arr[$j+1] = $arr[$j];
                $j--;
            }
            $arr[$j+1] = $temp;
        }
        return $arr;
    }

    public function shellSort($arr, $span_arr) {
        $size_arr = count($arr);
        $size_span = count($span_arr);

        for ($i = 0; $i < $size_span; $i ++) {
            $span = $span_arr[$i];

            for ($j=0; $j<$size_arr-$span; $j++) {
                $k = $j;
                $temp = $arr[$j+1];
                while ($k>-1 && $temp<$arr[$k]) {
                    $arr[$k+1] = $arr[$k];
                    $k--;
                }
                $arr[$k + 1] = $temp;
            }

        }
        return $arr;
    }
}