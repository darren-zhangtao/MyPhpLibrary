<?php
require_once "Interview/CharacterSort.php";

use Interview\CharacterSort;

$characterSort = new CharacterSort();
$str = 'abc';
$characterSort->sort($str, 0, 2);