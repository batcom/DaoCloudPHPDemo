<?php
$mysqli = new mysqli(getenv("MYSQL_PORT_3306_TCP_ADDR"), getenv("MYSQL_USERNAME"), getenv("MYSQL_PASSWORD"), getenv("MYSQL_INSTANCE_NAME"));
$result = $mysqli->query("SELECT id,data FROM test");
$row = $result->fetch_assoc();
echo htmlentities($row['id'] . " " . $row['data']);
?>
