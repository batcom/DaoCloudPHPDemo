<?php
$mysqli = new mysqli(getenv("MYSQL_PORT_3306_TCP_ADDR"), getenv("MYSQL_USERNAME"), getenv("MYSQL_PASSWORD"), getenv("MYSQL_INSTANCE_NAME"));
// 请注意连接参数的构建，直接使用getenv方法来获取连接参数。参数名字是DaoCloud给的固定参数。
$result = $mysqli->query("SELECT id,data FROM test");
$row = $result->fetch_assoc();
echo htmlentities($row['id'] . " " . $row['data']);
?>
