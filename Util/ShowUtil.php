<?php

namespace Util;


class ShowUtil
{
    public static function showArray($arr) {
        foreach ($arr as $item => $value) {
            echo $item . ' => ' . $value . "\n";
        }
    }
}