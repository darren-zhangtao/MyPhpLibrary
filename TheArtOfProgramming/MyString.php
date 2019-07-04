<?php


namespace TheArtOfProgramming;

use function PHPSTORM_META\elementType;

class MyString
{
    /**
     * 给定一个字符串，要求把字符串前面的若干个字符移动到字符串的尾部，如把字符串“abcdef”前面的2个字符'a'和'b'移动到字符串的尾部，
     * 使得原字符串变成字符串“cdefab”。请写一个函数完成此功能，要求对长度为n的字符串操作的时间复杂度为 O(n)，空间复杂度为 O(1)。
     */

    // 解法一

    //将一个字符移动到字符串末尾
    public function LeftShiftOne(&$str, $len)
    {
        $temp = $str[0];
        for ($i = 0; $i < $len - 1; $i++) {
            $str[$i] = $str[$i + 1];
        }
        $str[$len - 1] = $temp;
    }

    //将m个字符移动到字符串末尾
    public function LeftRotateString($str, $len, $n)
    {
        for ($i = 0; $i < $n; $i++) {
            self::LeftShiftOne($str, $len);
        }
        return $str;
    }

    //解法二
    //(X^TY^T)^T=YX
    public function ReverseString(&$str, $from, $to)
    {
        while ($from < $to) {
            $temp = $str[$from];
            $str[$from] = $str[$to];
            $str[$to] = $temp;
            $from++;
            $to--;
        }
    }

    public function LeftRotateString_2($str, $len, $n)
    {
        $n = $n % $len;
        self::ReverseString($str, 0, $n - 1);
        self::ReverseString($str, $n, $len - 1);
        self::ReverseString($str, 0, $len - 1);
        return $str;
    }


    /**
     * 给定两个分别由字母组成的字符串A和字符串B，字符串B的长度比字符串A短。请问，如何最快地判断字符串B中所有字母是否都在字符串A里？
     * 为了简单起见，我们规定输入的字符串只包含大写英文字母，请实现函数bool StringContains(string $a, string $b)
     */

    //解法一
    public function StringContains($a, $b)
    {
        for ($i = 0; $i < strlen($b); $i++) {
            for ($j = 0; $j < strlen($a); $j++) {
                if ($b[$i] == $a[$j]) {
                    break;
                }
            }
            if ($j == strlen($a)) {
                return false;
            }
        }
        return true;
    }

    public function StringContains_2($a, $b)
    {
        $map = array(
            'A' => 2,
            'B' => 3,
            'C' => 5,
            'D' => 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101
        );
        $a_sum = 1;
        foreach ($a as $item_a) {
            $a_sum *= $map[$item_a];
        }
        foreach ($b as $item_b) {
            if ($a_sum % $item_b > 0) {
                return false;
            }
        }
        return true;
    }

    //输入一个由数字组成的字符串，把它转换成整数并输出。例如：输入字符串"123"，输出整数123。
    public function StrToInt($str)
    {
        $str = str_split($str);
        $ret = 0;
        foreach ($str as $item) {
//            if (!is_numeric($item)) {
//                return $ret;
//            }
            $ret = $ret * 10 + $item;
        }
        return $ret;
    }

    //回文，英文palindrome，指一个顺着读和反过来读都一样的字符串，比如madam、我爱我，这样的短句在智力性、趣味性和艺术性上都颇有特色，中国历史上还有很多有趣的回文诗。
    //那么，我们的第一个问题就是：判断一个字串是否是回文？
    public function IsPalindrome($str)
    {
        $start = 0;
        $end = strlen($str) - 1;
        while ($end > $start) {
            if ($str[$start] != $str[$end]) {
                return 0;
            }
            $start++;
            $end--;
        }
        return 1;
    }

    //字符串全排列

    public function swap(&$str, $pos1, $pos2)
    {
        if ($pos1 != $pos2) {
            $temp = $str[$pos1];
            $str[$pos1] = $str[$pos2];
            $str[$pos2] = $temp;
        }
    }

    public function Permutation($str, $begin, $end)
    {
        if ($begin == $end) {
            echo $str;
            echo "\n";
        } else {
            for ($j = $begin; $j <= $end; $j++) {
                $this->swap($str, $j, $begin);
                $this->Permutation($str, $begin + 1, $end);
                $this->swap($str, $j, $begin);
            }
        }
    }

}