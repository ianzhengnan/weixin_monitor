<?php


function file_get_contents_curl($url){

	$ch = curl_init();

    $headers = array(
        "Content-type: text/html; charset=\"Unicode\"",
        "Accept: text/xml",
        "Cache-control: no-cache",
        "Pragma: no-cache"
    );

	//curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');

    $data = curl_exec($ch);
    
   	if (curl_error($ch)) {
   		die(curl_error($ch));
   	}

    curl_close($ch);

    return $data;
}

$content = file_get_contents_curl("http://www.sh.10086.cn/shop/product/101168.html");
//$content = utf8_decode($content);
//$content = iconv("gb2312", "utf-8", $content);
//$content = file_get_contents("http://www.sh.10086.cn/shop/product/101168.html");

echo $content;

