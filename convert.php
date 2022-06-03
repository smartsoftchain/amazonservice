<?php
	
	if($_REQUEST["mode"] == "img"){
		@unlink("./convert/test.log");
		@unlink("./convert/test.png");
		@unlink("./convert/test.ai");
		@unlink("./convert/test.eps");
		exec("rm -rf ./convert/test.log");
		exec("rm -rf ./convert/test.png");
		exec("rm -rf ./convert/test.ai");
		exec("rm -rf ./convert/test.eps");
		$canvas = $_REQUEST["img"];
		$name = $_REQUEST["name"];
		$name2 = $_REQUEST["name2"];
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
			$scp = "convert ./files/haikei1.png ./convert/".$name.".png -gravity northwest -geometry +40+40 -compose over -composite ./convert/".$name2.".png";
			exec($scp,$res);
			var_dump($scp);
		}
		//@file_put_contents(dirname(__FILE__)."/convert/test.png", $img);
		//exec("convert ./convert/test.png ./convert/test.ai");
		//exec("convert ./convert/test.png ./convert/test.eps");
	}elseif($_REQUEST["mode"] == "img2"){
		@unlink("./convert/test2.png");
		exec("rm -rf ./convert/test2.png");
		$canvas = $_REQUEST["img2"];
		$name = $_REQUEST["name"];
		//ヘッダに「data:image/png;base64,」が付いているので、それは外す
		$canvas = preg_replace("/data:[^,]+,/i","",$canvas);
		 
		//残りのデータはbase64エンコードされているので、デコードする
		$canvas = base64_decode($canvas);
		//まだ文字列の状態なので、画像リソース化
		$image = imagecreatefromstring($canvas);
		 
		//画像として保存（ディレクトリは任意）
		imagesavealpha($image, TRUE); // 透明色の有効
		imagepng($image ,'./convert/'.$name.'.png');
	}
	
	
	
?>