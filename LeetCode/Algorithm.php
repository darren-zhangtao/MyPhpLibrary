<?php

namespace LeetCode;

use LeetCode\ListNode;

class Algorithm {

    //两数相加，数组解法
    public static function no_2_addTwoNumbers ($l1, $l2) {
        $length1 = count($l1);
        $length2 = count($l2);
        if ($length1 == 0) {
            return $l2;
        }
        if ($length2 == 0) {
            return $l1;
        }
        $l3 = array();  //结果数组
        $carry = 0;        //保存进位
        $length3 = $length1 > $length2 ? $length1 : $length2;
        for ($i=0; $i<$length3; $i++) {
            $num1 = isset($l1[$i]) ? $l1[$i] : 0;
            $num2 = isset($l2[$i]) ? $l2[$i] : 0;
            $sum = $num1 + $num2 + $carry;
            $carry = $sum / 10;
            $l3[$i] = $sum % 10;
        }
        if ($carry > 0) {
            $l3[$length3] = 1;
        }
        return $l3;
    }

    //两数相加，链表解法
    public static function no_2_addTwoNumbers_listNode (ListNode $l1, ListNode $l2) {
        $carry = 0;
        do {

        } while(1);
    }

}