<?php
header("Content-Type: text/html;charset=utf-8"); 
ini_set("memory_limit", "1024M");
ini_set('max_execution_time', '360000');
ini_set( 'display_errors', 1 );
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set( "log_errors", "On" );
ini_set( "error_log", "./log/".date("Y-m-d")."_php.log" );

$act = (isset($_REQUEST['act'])) ? $_REQUEST['act'] : "";

session_start();
$data = array();



$path = "../inc";
	require_once($path."/conf.php");
	require_once($path."/my_db.inc");
	require_once($path."/htmltemplate.inc");
	require_once($path."/errlog.inc");
	

$DB_URI = array("host" => $DB_SV, "db" => $DB_NAME, "user" => $DB_USER, "pass" => $DB_PASS);
define("SITE_INFO", "総合管理画面");


$data["admin"]["title"] = SITE_INFO;


define("SCRIPT_ENCODING", "UTF-8");
// データベースの漢字コード
define("DB_ENCODING", "UTF-8");
// メールの漢字コード(UTF-8かJIS)
define("MAIL_ENCODING", "JIS");


//サイドメニュー
$menu = array(
	array("title" => "サイト管理"),
	array("act" => "top", "title" => "管理画面TOP"),
	array("act" => "gs_list", "title" => "事業者コード管理"),
	array("act" => "gs_regist", "title" => "事業者コード登録"),
	array("act" => "jan_list", "title" => "JANコード管理"),
	array("act" => "setup", "title" => "管理者情報変更"),

	array("act" => "logout", "title" => "ログアウト"),
);
$data["menu"] = $menu;

// --------------------------------
// 各ページの処理

$html = &htmltemplate::getInstance();

/*--------------------------------*/
if($act == "logout"){
	$_SESSION = array();
	session_destroy();
	$act = "login";
}

/*----------------------------

セッションが切れていたらログインページへ

--------------------------------*/

if(!isset($_SESSION["ADMIN_LOGIN_JAN"])){
	$act = "login";
}
/*----------------------------

act = login　ログイン

--------------------------------*/

if($act == "login"){
	if ($_REQUEST["id"] && $_REQUEST["passwd"]) {
		$id = htmlspecialchars($_REQUEST["id"]);
		$passwd = htmlspecialchars($_REQUEST["passwd"]);
		
		$inst = DBConnection::getConnection($DB_URI);
		//ログイン情報取得
		$sql = "select * from `admin` where `login_id`='".$_REQUEST["id"]."' and `login_pw`='".$_REQUEST["passwd"]."'";

		$ret = $inst->search_sql($sql);
		if($ret["count"] > 0){
			
				$_SESSION["ADMIN_LOGIN_JAN"] = "admin";
				$login_id = $ret["data"][0]["login_id"];
				$login_pw = $ret["data"][0]["login_pw"];

				$act="top";
			
		}else{
			$data["message"] = "ログインできません。IDとパスワードを確認してください。";
		}
	}
	if($act == "login"){
		$html->t_include("login.html", $data);
		exit;
	}
}

/*----------------------------

act = JANコードリスト

--------------------------------*/

if($act == "jan_list"){
	
	$inst = DBConnection::getConnection($DB_URI);
	
	$maxpage = 20;
	$page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$start = ($page-1)*$maxpage;
	if($start<0){$start=0;}
	$limit = " limit ".$start.",".$maxpage;
	
	
	$g_list = array();
	$sql = "select * from `gs1` order by `id`";
	$ret = $inst->search_sql($sql);
	if($ret["count"] > 0){
		foreach($ret["data"] as $key => $val){
			$g_list[$val["id"]] = array("name"=>$val["name"],"code"=>$val["code"]);
		}
	}
	
	
	$status = (isset($_REQUEST['status'])) ? $_REQUEST['status'] : 0;
	
	$where = "where 1";
	if($status == "9"){
		$data["status9"] = " selected";
	}else{
		$where .= " and `status` = '".$status."'";
		$data["status".$status] = " selected";
	}
	
	$list = array();
	$sql = "select * from `jan` ".$where." order by `id` desc";
	$ret = $inst->search_sql($sql);
	if($ret["count"] > 0){
		foreach($ret["data"] as $key => $val){
			$val["name"] = $g_list[$val["gid"]]["name"];
			$val["gid"] = $g_list[$val["gid"]]["code"];
			if($val["status"] == "0"){
				$val["status"] = "未使用";
			}else{
				$val["status"] = "使用済み";
			}
			$list[] = $val;
		}
	}
	$data["list"] = $list;
	
	$data_count = 0;
	$ret2 = $inst->search_sql($sql);
	//全データ件数取得
	$data_count = $ret2["count"];
	$data["cnt"] = $data_count;

	$page_count = ceil($data_count / $maxpage);

	$data["pagingstring"] = Paging ((int)$page,"jan_list",(int)$page_count);
	
	
	
	$html->t_include("jan_list.html", $data);
	exit;
}



/*----------------------------

act = 管理者情報更新

--------------------------------*/

if($act == "setup"){
	$inst = DBConnection::getConnection($DB_URI);
	if($_REQUEST["mode"] == "update"){
		$login_id=$_REQUEST["login_id"];
		$login_pw = $_REQUEST["login_pw"];
		$sql = "update `admin` set `login_id`='".$login_id."',`login_pw`='".$login_pw."' where `id`=1";
		$ret = $inst->db_exec($sql);
		$data["message"] = "更新しました。";
	}
	
	$sql = "select * from `admin` where id=1";
	$ret = $inst->search_sql($sql);
	if($ret["count"] > 0){
		$data["form"] = $ret["data"][0];
	}
	$html->t_include("setup.html", $data);
	exit;
}
/*----------------------------

act = 事業者コード削除

--------------------------------*/

if($act == "gs_del"){
	$id = $_REQUEST["id"];
	$inst = DBConnection::getConnection($DB_URI);
	//事業者コードを取得
	$sql = "select * from `gs1` where `id`=".$id."";
	$ret = $inst->search_sql($sql);
	if($ret["count"] > 0){
		$code = $ret["data"][0]["code"];
		exec("rm -rf ../img/".$code."*");
	}
	$sql = "delete from `gs1` where `id`=".$id."";
	$inst->db_exec($sql);
	//JANコードも削除
	$sql = "delete from `jan` where `gid`=".$id."";
	$inst->db_exec($sql);
	
	exit;
}




/*----------------------------

act = 事業者コードリスト

--------------------------------*/

if($act == "gs_list"){
	
	$inst = DBConnection::getConnection($DB_URI);
	
	$where = "where 1";
	if($_REQUEST["keyword"]){
		$where .= " and `name` LIKE '%".$keyword."%'";
	}
	
	$list = array();
	$sql = "select * from `gs1` ".$where." order by `id` desc";
	$ret = $inst->search_sql($sql);
	if($ret["count"] > 0){
		foreach($ret["data"] as $key => $val){
			$list[] = $val;
		}
	}
	$data["list"] = $list;
	
	$html->t_include("gs_list.html", $data);
	exit;
}

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
/*----------------------------

act = 事業者コード登録

--------------------------------*/

if($act == "gs_regist"){
	$inst = DBConnection::getConnection($DB_URI);
	$include_path= dirname(__FILE__)."/pear/PEAR/";
	ini_set('include_path', $include_path);
	require('Image/Barcode2.php');
	if($_REQUEST["mode"]=="new"){
		$code = $_REQUEST["code"];
		$name = $_REQUEST["name"];
		if($code){
			foreach($code as $key => $val){
				if(strlen($val) == 9){
					//既に存在しているかどうか
					$sql = "select * from `gs1` where `code`='".trim($val)."'";
					$ret = $inst->search_sql($sql);
					if($ret["count"] == 0){
						//事業者コード登録
						$sql = "insert into `gs1`(`name`,`code`) values ('".$name."','".trim($val)."');";
						$inst->db_exec($sql)or die($sql);
						$sql = "select last_insert_id() as id";
						$rt = $inst->search_sql($sql);
						if ($rt["count"] > 0) {
							$id = $rt["data"][0]["id"];
						}
						if($id > 0){
							//JANコード生成
							for($i=1;$i<=999;$i++){
								if(strlen($i) == 1){
									$ii = "00".$i;
								}elseif(strlen($i) == "2"){
									$ii = "0".$i;
								}else{
									$ii = $i;
								}
								$code = new Image_Barcode2();
								$product_code = $ii;
								$check_dijit = calcJanCodeDigit($val.$product_code);
								$jan_number = $val.$product_code.$check_dijit;
								$image = $code->draw($jan_number,"ean13", 'png',false);
								$file_path = "../img/".$jan_number."_jancode.png";
								imagepng($image, $file_path);
								//JANコード登録
								$sql = "insert into `jan`(`gid`,`jan`) values('".$id."','".$jan_number."')";
								
								$inst->db_exec($sql) or die($sql);
							}
						}
					}
				}
			}
		}
	}
	
	
	$html->t_include("gs_regist.html", $data);
	exit;
}

/*----------------------------

act =  TOP一覧画面

--------------------------------*/


$html->t_include("top.html", $data);
exit;

function Paging ($page,$act,$page_count,$para=""){

	$pagingstring = "";
	if ($page > 1) {
		$pagingstring .= "<span class=\"pre\"><a rel=\"next\" href=\"./?act=".$act."&page=".strval($page - 1)."".$para."\" title=\"前のページへ\">&laquo;前のページへ</a></span>";
		for ($i = 5; $i >= 1; $i--) {
			if ($page - $i >= 1) {
				$pagingstring .= "<span class=\"num\"><a href=\"./?act=".$act."&page=".strval($page - $i)."".$para."\" >".strval($page - $i)."</a></span>";
			}
		}
	}
	$pagingstring .= "<span class=\"num\">".strval($page)."</span>";
	if ($page < $page_count) {
		for ($i = 1; $i <= 5; $i++) {
			if ($page + $i <= $page_count) {
				$pagingstring .= "<span class=\"num\"><a href=\"./?act=".$act."&page=".strval($page + $i)."".$para."\">".strval($page + $i)."</a></span>";
			}
		}
		$pagingstring .= "<span class=\"next\"><a rel=\"next\" href=\"./?act=".$act."&page=".strval($page + 1)."".$para."\" title=\"次のページへ\">次のページへ&raquo;</a></span>";
	}
	return $pagingstring;
}


function download_csv2($data, $filename,$top){
	header("Content-disposition: attachment; filename=" . $filename);
	header("Content-type: text/x-csv; charset=Shift_JIS");
	echo $fp,mb_convert_encoding(implode(",", $top), "Shift_Jis", "utf-8") . "\r\n";
	foreach ($data as $val) {
		$csv = array();
		foreach ($val as $item) {
			array_push($csv, $item);
		}
		echo mb_convert_encoding(implode(",", $csv), "Shift_Jis", "utf-8") . "\r\n";
	}
	exit;
}
?>