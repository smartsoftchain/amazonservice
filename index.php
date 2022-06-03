<?php

$baseurl = "http://203.189.96.217/tests/";
if($_REQUEST["send"]){
	$url = $_REQUEST["url"];
	$img = "";
	if($_FILES['img']['tmp_name']){
		if ($_FILES["img"]["tmp_name"] != "") {
			$mictime = microtime();
			$fileinfo = pathinfo($_FILES["img"]["name"]);
			$fileext = strtoupper($fileinfo["extension"]);
			$img = substr($mictime, 11) . substr($mictime, 2, 6) . "." . strtolower($fileext);
			move_uploaded_file($_FILES["img"]["tmp_name"], "img/".$img);
		}
		$filename = $img;
	}
	$str = '
<link rel="stylesheet" href="'.$baseurl.'hover-min.css">
<style type="text/css">
<!--
.anihv img{max-width:100%;width:auto;height:auto;}a.anihv{text-align:left;position:relative;}a.anihv img{width:95%;max-width:450px;height:auto;display:block;margin:0 auto;border:none;transition:all 0.5s ease;}a.anihv:hover img{width:100%;max-width:468px;opacity:0.7;margin-top:-1.5%;}.arrow-btn{background:url(images/arrow-btn.png);background-size:contain;background-repeat:no-repeat;background-position:0px 0px;display:block;width:100%;height:100%;position:absolute;bottom:0;left:0;overflow:visible;}@media screen and (max-width:650px){.mywidth{width:100%;}}
//-->
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function moveArrow(){
	$(\'.arrow-btn\').animate({backgroundPosition:\'-=20px\'}
	,800).animate({backgroundPosition:\'+=20px\'}
	,800);
	setTimeout(\'moveArrow()\',1600);
}
var $j = jQuery.noConflict();
$j(function(){
	$j(\'.anihv\').addClass(\'hvr-wobble-top\');
	$j(\'.anihv\').append(\'<div class="arrow-btn"></div>\');
	$j(function(){
		setTimeout(\'moveArrow()\');}
	);

	$j(\'.anihv\').mouseover(function(){
		document.getElementById(\'sound-file\').play() ;
	});
});
</script>';
$str2 = '<p><a class="anihv" href="'.$url.'" target="_blank"><img class="alignnone wp-image-1067 size-full" src="'.$baseurl.'img/'.$filename.'" alt="btn" /></a></p>
<audio id="sound-file" preload="auto">
	<source src="'.$baseurl.'decision22.mp3" type="audio/mp3">
</audio>
';
	/*
	file_put_contents("index.html",$str);
	$zip = new ZipArchive();
	$fname = 'files.zip';
	$res = $zip->open($fname, ZipArchive::CREATE);
	//$zipfile->setDoWrite();
	// zipファイルのオープンに成功した場合
	if ($res === true) {
	    $zip->addFile('custom.js');
	    $zip->addFile('hover-min.css');
	    $zip->addFile('style.css');
	    $zip->addFile($_FILES["img"]["name"]);
	    $zip->addFile('index.html');
	    $zip->close();
	    header('Content-Type: application/force-download');
		header('Content-Length: '.filesize($fname));
		header('Content-disposition: attachment; filename=files.zip');
		readfile($fname);
	}
	*/
}



?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<title></title>
<link rel="stylesheet" href="hover-min.css">
<link rel="stylesheet" href="style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>
<script type='text/javascript' src='custom.js'></script>
</head>
<body>
<form action="index.php" method="post" name="form1" enctype="multipart/form-data">
画像ファイル：<input type="file" name="img" /><br />
URL:<input type="text" name="url" value="<?php echo $url; ?>">
<input type="submit" name="send" value=" 送 信 ">
</form>
<?php if($str){?>
	■ヘッダ<br />
	<textarea cols="120" rows="40" onclick="this.select()"><?php echo $str; ?></textarea><br />
	■表示部<br />
	<textarea cols="120" rows="40" onclick="this.select()"><?php echo $str2; ?></textarea>
<?php }?>
</body>
</html>