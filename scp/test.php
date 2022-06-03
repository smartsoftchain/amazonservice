<?php
header("Content-Type: text/html;charset=utf-8");
ini_set( 'display_errors', 1 );

if (!function_exists('json_encode')) {
	require 'JSON.php';
	function json_encode($value) {
		$s = new Services_JSON();
		return $s->encodeUnsafe($value);
	}
	
	function json_decode($json, $assoc = false) {
		$s = new Services_JSON($assoc ? SERVICES_JSON_LOOSE_TYPE : 0);
		return $s->decode($json);
	}
}

		$cookie_file_path = dirname(__FILE__).'/log/cookie.txt';
		@unlink($cookie_file_path);
		touch($cookie_file_path);
		//クッキー保存ファイルを作成
	   $params = array( 
		    "username" => 'sakka', 
		    "passwd" => '06110204', 
		    "submit"  => "ログイン"
		); 
		//$file = "https://www.mql5.com/ja/signals/".$val."#!tab=trading";
		$file2 = "http://www.leam.com/index.php?option=com_user&task=login";
		$file3 = "http://www.leam.com/ja/%E3%82%B7%E3%83%A7%E3%83%83%E3%83%97/view-all-products-in-shop?limit=100&limitstart=";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $file2);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
		$put = curl_exec($ch) or dir('error ' . curl_error($ch)); 
		curl_close($ch);
		//第１段階

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $file2);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		$output = curl_exec($ch) or dir('error ' . curl_error($ch)); 
		curl_close($ch);
		//第２段階
		
//http://www.leam.com/ja/%E3%82%B7%E3%83%A7%E3%83%83%E3%83%97/view-all-products-in-shop?limit=100&limitstart=1
//http://www.leam.com/ja/%E3%82%B7%E3%83%A7%E3%83%83%E3%83%97/view-all-products-in-shop?limit=100&limitstart=101
		
		//1ページ目
		$ch = curl_init($file3."1"); 
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path); 
		  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path); 
		  curl_setopt($ch, CURLOPT_POST, TRUE); 
		  $output2 = curl_exec($ch); 
		  curl_close($ch); 
		
		$matches = array();
		$pattern = '/<div class=\"colsRow\" id(.*?)<\/div><\/div>[\s　]*<\/a>/is';
		if (preg_match_all($pattern, $output2, $matches, PREG_PATTERN_ORDER)) {
			var_dump($matches[1])."\n";
		}
		
		
		
		
		
		
		
?>