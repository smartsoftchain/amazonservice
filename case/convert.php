<?php


$path = "./inc";
	require_once($path."/conf.php");
	require_once($path."/my_db.inc");
	require_once($path."/htmltemplate.inc");
	require_once($path."/errlog.inc");
	

$DB_URI = array("host" => $DB_SV, "db" => $DB_NAME, "user" => $DB_USER, "pass" => $DB_PASS);

define("SCRIPT_ENCODING", "UTF-8");
// データベースの漢字コード
define("DB_ENCODING", "UTF-8");
// メールの漢字コード(UTF-8かJIS)
define("MAIL_ENCODING", "JIS");
	
		$name = "waku";
		$name2 = "gousei";
		$name3 = "haikei";
		
		$cnf = $_REQUEST["cnf"];
		$chk = $_REQUEST["chk"];

	if($_REQUEST["mode"] == "img"){
		@unlink("./convert/test.log");
		@unlink("./convert/test.png");
		@unlink("./convert/test.ai");
		@unlink("./convert/test.eps");
		exec("rm -rf ./convert/*.log");
		exec("rm -rf ./convert/*.png");
		exec("rm -rf ./convert/*.ai");
		exec("rm -rf ./convert/*.eps");
		exec("rm -rf ./convert/*.zip");
		$canvas = $_REQUEST["img"];
		
		//JAN取得だったらファイル名をJANに
		if($chk == "on"){
			$jan = GetJan($cnf);
			$name = $jan."_".$name;
			$name2 = $jan."_".$name2;
		}else{
			$name = $cnf."_".$name;
			$name2 = $cnf."_".$name2;
		}
		
		//ヘッダに「data:image/png;base64,」が付いているので、それは外す
		$canvas = preg_replace("/data:[^,]+,/i","",$canvas);
		 
		//残りのデータはbase64エンコードされているので、デコードする
		$canvas = base64_decode($canvas);
		//まだ文字列の状態なので、画像リソース化
		$image = imagecreatefromstring($canvas);
		 
		//画像として保存（ディレクトリは任意）
		imagesavealpha($image, TRUE); // 透明色の有効
		imagepng($image ,'./convert/'.$name.'.png');
		
		//画像合成
		if(file_exists("./convert/".$name.".png")){
			if($_REQUEST["type"] == "2"){
				
				$scp = "convert ./convert/".$name.".png -resize 200% ./convert/resize.png";
				exec($scp,$res);
			}else{
				$scp = "convert ./convert/".$name.".png -resize 150% ./convert/resize.png";
				exec($scp,$res);
			}
			$scp = "convert ./files/haikei2.png ./convert/resize.png -gravity northwest -geometry +760+315 -compose over -composite ./convert/".$name2.".png";
			exec($scp,$res);
		}
		//@file_put_contents(dirname(__FILE__)."/convert/test.png", $img);
		//exec("convert ./convert/test.png ./convert/test.ai");
		//exec("convert ./convert/test.png ./convert/test.eps");
	}elseif($_REQUEST["mode"] == "img2"){
		@unlink("./convert/test2.png");
		exec("rm -rf ./convert/test2.png");
		$canvas = $_REQUEST["img2"];
		$chk = $_REQUEST["chk"];
		$jan = "";
		//JAN取得だったらファイル名をJANに
		if($chk == "on"){
			$jan = GetJan2($cnf);
			$name3 = $jan."_".$name3;
			$name = $jan."_".$name;
			$name2 = $jan."_".$name2;
			$zipname = $jan.".zip";
			copy("./img/".$jan."_jancode.png","./convert/".$name3.".png");
			exec("cp ./img/".$jan."_jancode.png ./convert/".$jan."_jancode.png");
		}else{
			$name3 = $cnf."_".$name3;
			$name = $cnf."_".$name;
			$name2 = $cnf."_".$name2;
			$zipname = $cnf.".zip";
		}
		
		
		//ヘッダに「data:image/png;base64,」が付いているので、それは外す
		$canvas = preg_replace("/data:[^,]+,/i","",$canvas);
		 
		//残りのデータはbase64エンコードされているので、デコードする
		$canvas = base64_decode($canvas);
		//まだ文字列の状態なので、画像リソース化
		$image = imagecreatefromstring($canvas);
		 
		//画像として保存（ディレクトリは任意）
		imagesavealpha($image, TRUE); // 透明色の有効
		imagepng($image ,'./convert/'.$name3.'.png');
		
		
		chdir("convert");
		$zip = new ZipArchive();
		$res = $zip->open($zipname, ZipArchive::CREATE);
		 // DoWriteモード
		//$zipfile->setDoWrite();
		// zipファイルのオープンに成功した場合
		if ($res === true) {
		 
		    // 圧縮するファイルを指定する
		    $zip->addFile($name.'.png');
		    $zip->addFile($name2.'.png');
		    $zip->addFile($name3.'.png');
		    if($chk == "on"){
		    	$zip->addFile($jan."_jancode.png");
		    }
		    // ZIPファイルをクローズ
		    $zip->close();
		}
		if($chk == "on"){
			echo $jan;
		}else{
			echo $cnf;
		}
		
		
		
		
	}elseif($_REQUEST["mode"] == "jan"){
		$inst = DBConnection::getConnection($DB_URI);
		//ランダムに1件取得し、janコードを返す
		$sql = "select * from `jan` where `status`=0 order by rand() limit 1";
		$ret = $inst->search_sql($sql);
		if($ret["count"] > 0){
			$jan = $ret["data"][0];
			//このJANを使用済みにする
			$sqlu = "update `jan` set `status`=1 where `id`='".$jan["id"]."'";
			$retu = $inst->db_exec($sqlu);
			echo $jan["jan"];
		}
		exit;
	}
	
	
	function GetJan($cnf){
		global $DB_URI;
		$inst = DBConnection::getConnection($DB_URI);
		//ランダムに1件取得し、janコードを返す
		$sql = "select * from `jan` where `status`=0 order by rand() limit 1";
		$ret = $inst->search_sql($sql);
		if($ret["count"] > 0){
			$jan = $ret["data"][0];
			//このJANを使用済みにして時間登録
			$sqlu = "update `jan` set `status`=1,`regist`='".$cnf."' where `id`='".$jan["id"]."'";
			$retu = $inst->db_exec($sqlu);
			return $jan["jan"];
		}
		return;
	}
	function GetJan2($cnf){
		global $DB_URI;
		$inst = DBConnection::getConnection($DB_URI);
		//時間からJANコードを返す
		$sql = "select * from `jan` where `regist`='".$cnf."' limit 1";
		$ret = $inst->search_sql($sql);
		if($ret["count"] > 0){
			$jan = $ret["data"][0];
			return $jan["jan"];
		}
		return;
	}
	
	exit;
?>