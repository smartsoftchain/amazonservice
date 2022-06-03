<?php
	$new = "";$titles = array();
	$handle = fopen ("bbb.txt", "r");
	while (!feof ($handle)) {
    	$str = Encode_str(fgets($handle, 4096));
    	$str = str_replace("：",":",$str);
    	if(strpos($str,"■") !== false){
    		$c = explode(":",$str);
    		$cc = trim(str_replace("■","",$c[0]));
    		$titles[$c[0]] = $c[0];
    		if(strpos($str,"■ステップメール名") !== false){
    			$new .= "\n\n■".trim($c[1]);
    		}else{
    			$t = strlen($c[0]);
    			$new .= "■".substr($str, $t);
    		}
    	}
	}
	fclose($handle);
	
	var_dump($titles);
	$new1 = "";
	foreach($titles as $key => $val){
		$new1 .= str_replace(array(":","："),"",$key)."\n";
	}
	
	$new = $new1.$new;
	
	$fp = fopen("bbbb.txt", "w");
	fputs($fp,Decode_str($new));
	fclose($fp);
	
	

function Decode_str($val){
	//return $val;
	$str = mb_convert_encoding($val, "shift-jis", "UTF-8");
	return $str;
}
function Encode_str($val){
	$str = mb_convert_encoding($val, "UTF-8", "shift-jis");
	return $str;
}

?>