<?php
file_put_contents('/usr/share/nginx/www/time.php', '<?php echo date("Y-m-d H:i:s",time())?>');