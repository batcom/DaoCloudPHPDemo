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
$urls = array('http://freeios.uwewe.com/get/signPC.aspx?weweid=9828877',
		'http://actives.youku.com/ac/sign/index?pl=web',
	);
$uwewe_get = curl_request('http://freeios.uwewe.com/act/sign.aspx?plat=ios&from=41&weweid=9828877&pwd=0584cb38b57b577faf7a76b481d3e5d3&validate=43dd7a1b8c4e68f55899f1ab84928f71&did=02:00:00:00:00:00&phone=18627092765&required_DFA=19296152-358D-4AFE-9456-FA34D934B35C&required_loc=CN&required_plat=ios&required_mark=41&required_ver=22278');
preg_match('#<span ID="lbltime" >(\d+)</span>分钟#', $uwewe_get,$match);
$balance= $match['1'];
$time = date('Y-n-j%20H:i:s%20Z');
$task_uwewe = "http://freeios.uwewe.com/get/sign.aspx?action=getsign&ptime=$time&weweid=9828877&balance=$balance.00&from=41&phone=18627092765&version=22278";
echo curl_request($task_uwewe);
