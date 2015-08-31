<?php
echo file_get_contents('http://www.uwewe.com/get/signPC.aspx?weweid=9828877');
$str = <<<EOD
<?php
echo date('Y-m-d',time());
EOD;
file_put_contents('/usr/share/nginx/www/time.php', $str);