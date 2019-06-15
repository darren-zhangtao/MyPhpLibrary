<?php


namespace Interview;


class CharacterSort
{
    public function swap(&$str, $begin, $end) {
        if ($begin != $end) {
            $temp = $str[$begin];
            $str[$begin] = $str[$end];
            $str[$end] = $temp;
        }
//        var_dump($str);
    }

    public function sort($str, $begin, $end) {
        if ($begin == $end) {
            echo $str[$begin];echo "\n";
        }
        for ($i=$begin; $i<=$end; $i++) {
            $this->swap($str, $begin, $i);
            $this->sort($str, $begin+1, $end);
            $this->swap($str, $begin, $i);
        }
    }
}