<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials:true');
header("Content-Type: text/html;charset=utf-8"); 
ini_set( 'display_errors', 0 );
include_once("config.php");
		$type_list = array("jan"=>"EAN","asin"=>"ASIN","isbn"=>"ISBN");
		$no = $_REQUEST["no"];
		$type = $_REQUEST["type"];
if($_REQUEST["mode"] == "search"){
	$str = "";
		$sel[$type] = "selected";
		$include_path= dirname(__FILE__)."/PEAR/";
		ini_set('include_path', $include_path);
		require_once 'Services/Amazon.php';
		$amazon = new Services_Amazon(AMAZON_ACCESS_KEY, AMAZON_SECRET,"vc-22");
		$amazon->setBaseUrl('http://ecs.amazonaws.jp/onca/xml');
		$options = array();
		$options['IdType'] = $type_list[$type];
		$options['Version'] = '2010-09-01';
		$options['Condition'] = 'All';
		if($type != "asin"){$options['SearchIndex'] = 'Books';}
		//$options['ItemId'] = '';
		$options['MerchantId'] = 'All';
		$options['ResponseGroup'] = 'ItemAttributes,OfferFull,SalesRank';
		$response = $amazon->ItemLookup($no,$options);
		if(@get_class($response)!="PEAR_Error"){
			$item = $response["Item"][0];
			$asin = $item["ASIN"];
			$jan = $item["ItemAttributes"]["EAN"];
			$isbn = $item["ItemAttributes"]["ISBN"];
			$rank =$item["SalesRank"];
			$lower = $item["OfferSummary"]["LowestUsedPrice"]["Amount"];
			$name = $item["ItemAttributes"]["Title"];
			$str = "<p>商品名：".$name."</p>";
			$str .= "<p>ASIN：".$asin."</p>";
			$str .= "<p>JAN：".$jan."</p>";
			$str .= "<p>ISBN：".$isbn."</p>";
			$str .= "<p>ランキング：".$rank."</p>";
			$str .= "<p>中古最安値：".$lower."円</p>";
			//var_dump($item);
		}else{
			echo "データを取得できませんでした。";
			//var_dump($response);
		}
		//var_dump($response);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<form action="amazon.php" method="POST" name="form1">
<input type="hidden" name="mode" value="search">
検索タイプ：<select name="type">
	<option value="isbn" <?php echo $sel["isbn"];?>>ISBN</option>
	<option value="jan" <?php echo $sel["jan"];?>>JAN</option>
	<option value="asin" <?php echo $sel["asin"];?>>ASIN</option>
	</select><br />
コード：<input type="text" name="no" value="<?php echo $no; ?>"><br /><br />
	<input type="submit" name="searchBtn" value=" 検 索 ">
</form>
<div><?php echo $str; ?></div>
</body>
</html>