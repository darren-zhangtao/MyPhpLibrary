<?php
require_once "Util/ShowUtil.php";
require_once "Sort/InsertSort.php";
require_once "Sort/SelectSort.php";

use Util\ShowUtil;
use Sort\InsertSort;
use Sort\SelectSort;


echo "------------------------插入排序--------------------------- \n";
$arr = [45, 36, 2, 7, 5, 24];
echo "排序前： \n";
ShowUtil::showArray($arr);
echo "插入排序后： \n";
$insert = new InsertSort();
$ret = $insert->insertSort($arr);
ShowUtil::showArray($ret);

echo "------------------------希尔排序--------------------------- \n";
$arr = [65, 34, 25, 87, 12, 38, 56, 6, 14, 77, 92, 23];
echo "排序前： \n";
ShowUtil::showArray($arr);
echo "希尔排序后： \n";
$span_arr = [3, 2, 1];
$ret = $insert->shellSort($arr, $span_arr);
ShowUtil::showArray($ret);

echo "------------------------选择排序--------------------------- \n";
$arr = [65, 34, 25, 87, 12, 38, 56, 6, 14, 77, 92, 23];
echo "排序前： \n";
ShowUtil::showArray($arr);
echo "选择排序后： \n";
$ret = SelectSort::selectSort($arr);
ShowUtil::showArray($ret);