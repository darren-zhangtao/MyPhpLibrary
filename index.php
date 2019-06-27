<?php
//2019-05-17
//require_once "Index/index20190517.php";

//2019-05-18
//require_once "Index/index20190518.php";

//2019-06-03
//require_once "Index/index20190603.php";

//2019-06-15
//require_once "Index/indexLeetCode.php";

require_once "Redis/RedisStudy.php";

use Redis\RedisStudy;

$redis_study = new RedisStudy();

$redis_study->set('tt', 'hello world!');
echo $redis_study->get('tt');