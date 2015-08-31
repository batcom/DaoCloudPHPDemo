<?php
function curl_request($url, $sim = true, $method = "get", $postfields = NULL) {
		$ci = curl_init ();
		curl_setopt ( $ci, CURLOPT_URL, $url );
		curl_setopt ( $ci, CURLOPT_HEADER, FALSE );
		curl_setopt ( $ci, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt ( $ci, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:29.0) Gecko/20100101 Firefox/29.0');
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt ( $ci, CURLOPT_SSL_VERIFYHOST, 0 );
		if ('post' == strtolower ( $method )) {
			curl_setopt ( $ci, CURLOPT_POST, TRUE );
			if (is_array ( $postfields )) {
				$field_str = "";
				foreach ( $postfields as $k => $v ) {
					$field_str .= "&$k=" . urlencode ( $v );
													}
				curl_setopt ( $ci, CURLOPT_POSTFIELDS, $field_str );
										}
							}
		$response = curl_exec ( $ci );
		if (curl_errno ( $ci )) {
			throw new Exception ( curl_error ( $ci ), 0 );
		} else {
			$httpStatusCode = curl_getinfo ( $ci, CURLINFO_HTTP_CODE );
			if (200 !== $httpStatusCode) {
				throw new Exception ( $response, $httpStatusCode );
								}
					}
		curl_close ( $ci );
			return $response;
}
echo curl_request('http://www.uwewe.com/get/signPC.aspx?weweid=9828877');
$str = <<<EOD
<?php
echo date('Y-m-d',time());
EOD;
file_put_contents('/usr/share/nginx/www/time.php', $str);