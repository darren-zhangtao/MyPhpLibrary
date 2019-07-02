<?php


namespace TheArtOfProgramming;

class MyString
{
    /**
     * 给定一个字符串，要求把字符串前面的若干个字符移动到字符串的尾部，如把字符串“abcdef”前面的2个字符'a'和'b'移动到字符串的尾部，
     * 使得原字符串变成字符串“cdefab”。请写一个函数完成此功能，要求对长度为n的字符串操作的时间复杂度为 O(n)，空间复杂度为 O(1)。
     */

    // 解法一

    //将一个字符移动到字符串末尾
    public function LeftShiftOne(&$str, $len) {
        $temp = $str[0];
        for ($i=0; $i<$len-1; $i++) {
            $str[$i] = $str[$i+1];
        }
        $str[$len-1] = $temp;
    }
    //将m个字符移动到字符串末尾
    public function LeftRotateString($str, $len, $n) {
        for ($i=0; $i<$n; $i++) {
            self::LeftShiftOne($str, $len);
        }
        return $str;
    }

    //解法二
    //(X^TY^T)^T=YX
    public function ReverseString(&$str, $from, $to) {
        while ($from < $to) {
            $temp = $str[$from];
            $str[$from] = $str[$to];
            $str[$to] = $temp;
            $from++;
            $to--;
        }
    }

    public function LeftRotateString_2($str, $len, $n) {
        $n = $n % $len;
        self::ReverseString($str, 0, $n-1);
        self::ReverseString($str, $n, $len-1);
        self::ReverseString($str, 0, $len-1);
        return $str;
    }

}