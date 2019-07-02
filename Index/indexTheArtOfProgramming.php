<?php
/**
 * https://github.com/julycoding/The-Art-Of-Programming-By-July/blob/master/ebook/zh/Readme.md
 */

require_once "TheArtOfProgramming/MyString.php";
use TheArtOfProgramming\MyString;

$myString = new MyString();
$str = "abcdef";
$len = strlen($str);
echo $myString->LeftRotateString($str, $len,2);
echo "\n";
echo $myString->LeftRotateString_2($str, $len, 2);