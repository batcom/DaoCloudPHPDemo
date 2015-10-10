<?php
ini_set('display_errors', 1);//设置开启错误提示
error_reporting('E_ALL & ~E_NOTICE');//错误等级提示
var_dump(file_put_contents('task.txt', $_GET['time']));
