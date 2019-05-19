<?php
/**
 * Created by IntelliJ IDEA.
 * User: tt
 * Date: 19-5-18
 * Time: 下午3:08
 */
namespace Interview;
class CowAndString
{
    /*
     * 问题描述：假设一头奶牛的寿命是6年（0-5岁），在它第3岁和第5岁的时候会剩下一头小奶牛，在第6岁的时候死去; 小奶牛在第3岁和第5岁的时候也会生下一头小奶牛并在第6岁的时候死去;问：在第N年的时候存活的奶牛数量
     */
    public static function cowGenerate($n) {
        $sum[0] = 1;
        $sum[1] = 0;
        $sum[2] = 0;
        $sum[3] = 0;
        $sum[4] = 0;
        $sum[5] = 0;

        for ($i=1; $i<=$n; $i++) {
            $sum[5] = $sum[4];
            $sum[4] = $sum[3];
            $sum[3] = $sum[2];
            $sum[2] = $sum[1];
            $sum[1] = $sum[0];
            $sum[0] = $sum[3] + $sum[5];
            echo "This is " . $i . " year, and there is " . ($sum[0] + $sum[1] + $sum[2] + $sum[3] + $sum[4] + $sum[5]) . " cows. \n";
        }
    }

    /*
     * 问题描述：输入一个字符串（比如：asmmsdfmmmm），输出该字符串中最长的连续字符，如果有多个并列，那么输出多个
     */
    public static function successionString($str) {
        $record = array(); //记录每个字符及其连续出现的次数
        $sort = array(); //记录字符连续出现的次数，排序时使用
        $index = -1;
        $temp = '';
        for ($i=0; $i<strlen($str); $i++) {
            $char = $str[$i];
            if ($char == $temp) {
                $record[$index]['count']++;
                $sort[$index] = $record[$index]['count'];
            } else {
                $index++;
                $temp = $char;
                $record[$index]['char'] = $char;
                $record[$index]['count'] = 1;
                $sort[$index] = 1;
            }
        }
        array_multisort($sort, SORT_DESC, $record);
//        var_dump($record);
        $longest = current($record)['count'];
        echo "最长的连续字符串长度为：" . $longest . "\n";
        echo "满足条件的字符有：\n";
        foreach ($record as $item) {
            $count = $item['count'];
            if ($count == $longest) {
                echo $item['char'] . "\n";
            }
        }
    }
}