<?php
error_reporting(E_ALL);
var_dump(file_put_contents('task.txt', $_GET['time']));
