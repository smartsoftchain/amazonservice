<?php
ini_set( 'display_errors', 0 );
function calcJanCodeDigit($num) {

	$arr = str_split($num);

	$odd = 0;

	$mod = 0;

	for($i=0;$i<count($arr);$i++){

	   if(($i+1) % 2 == 0) {

		  //偶数の総和
		  $mod += intval($arr[$i]);

	   } else {

		  //奇数の総和
		  $odd += intval($arr[$i]);               

	   }

	}

	//偶数の和を3倍+奇数の総和を加算して、下1桁の数字を10から引く
	$cd = 10 - intval(substr((string)($mod * 3) + $odd,-1));

	//10なら1の位は0なので、0を返す。
	return $cd === 10 ? 0 : $cd;

}


require('./pear/PEAR/Image/Barcode2.php');

if($_POST['submit']=="JANコード生成"){
		
	//商品コードは3桁までなので999までいったらおしまい
	if(file_get_contents("product_code.txt")==999){
		
		file_put_contents("product_code.txt",000);
		
		file_put_contents("company_code.txt",file_get_contents("company_code.txt")+1);
		
	}
	
	$gs1_number = file_get_contents("company_code.txt"); //GS1企業コード
	
	
	if(file_get_contents("company_code.txt") > 458954016 || file_get_contents("company_code.txt") < 458954007){
		
		//貸与された事業者コードの範囲から外れていれば
		die("これ以上発行出来ません。");
		
		
	
	}else{
		
		$code = new Image_Barcode2();
		
		$product_code = sprintf("%03d",intval(file_get_contents("product_code.txt"))+1);
	
		$check_dijit = calcJanCodeDigit($gs1_number.$product_code);
		
		$jan_number = $gs1_number.$product_code.$check_dijit;
		
		$image = $code->draw($jan_number,"ean13", 'png',false);
		
		$file_path = 'img/'.$jan_number.'_jancode.png';
		
		imagepng($image, $file_path);
			
		file_put_contents("product_code.txt",$product_code);
		
		$result_html = "<img src=\"{$file_path}\" /><br /><input type=\"text\" value=\"{$jan_number}\">";
	
	}

}






?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無題ドキュメント</title>
</head>

<body>
<!--<img src="mihon.png"><br />-->

<form action="" method="post">

<input type="submit" value="JANコード生成" name="submit">

</form>

<?php echo $result_html;?>


</body>
</html>