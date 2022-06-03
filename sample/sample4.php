<?php
$waku_list = array(
	array("iPhone7 白","uvphonecase_ip7_white.png"),
	array("iPhone7 透明","uvphonecase_ip7_clear.png"),
);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link data-turbolinks-track="true" href="./img/application-95037920a78e465f16a8ce5048d9e829.css" media="all" rel="stylesheet">
	<link href="./img/font-awesome.css" rel="stylesheet">
	<meta content="authenticity_token" name="csrf-param">
	<meta content="Xqovtkk4eO5XJQaRAmQSHp73982kxMgJlUB5gAt+SeQ=" name="csrf-token">
	<title></title>
	<meta content="" name="description">
	<meta content="summary" property="twitter:card">
	<meta content="@canvath" property="twitter:site">
	<meta content="" property="og:title">
	<meta content="" property="og:description">
	<meta content="article" property="og:type">
	<meta content="" property="og:url">
	<meta content="" property="og:image">
	<meta content="width=device-width, initial-scale=1" name="viewport">
  <script data-turbolinks-track="true" src="./img/application-5e7f586e226aa9f6e101f482f2558b38.js"></script>

<style type="text/css">
<!--
#head{
	position: absolute;
	top:0;
	    z-index: 100;
}
#main{
	position:relative;
	/*padding-top: 30px;*/
	margin: 100px auto;
	height: 675px;
	width:349px;
}
.demo {
  /*width: 350px;*/
  overflow: hidden;
  cursor: -webkit-grab;
  position: absolute;
  top: 0px;
  left:-2px;
}
#shot{
	display:none;
}
#output_screen{
	top: -1000px;
    position: absolute;
    
}
#output_screen2{
	top: -1000px;
    position: absolute;
    
}
#back{
	/*width:900px;*/
	position: absolute;
	z-index:10;
}
.imgInput{
	padding-left:10px;
}
.downloadButton{
	width: 200px;
    display: none;
}
.downloadButton2{
	width: 150px;
    display: none;
}
//-->
</style>
<SCRIPT language="JavaScript">
<!--
// ドラッグして画像を移動する
x = 40; // マウスと画像の縦方向の距離
y = 30; // マウスと画像の横方向の距離
flag = false;
window.document.onmousemove = dragImg;
window.document.onmouseup = dragOff;
function dragOn(n) {
  flag = true; 
  imgName = n;
}
function dragOff() {
  flag = false;
}
function dragImg() {
  if(!flag) return;
  document.images[imgName].style.top = event.y - y;
  document.images[imgName].style.left = event.x - x;
  return false;
}
//-->
</SCRIPT>
</head>

<body>
	<header class="materials" id="globalheader">
		<div class="navbar navbar-fixed-top scroll" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-list"></i>
					</button>
					<a class="navbar-brand" href="https://www.canvath.jp/">
						<img alt="Canvth.jp" src="./img/logo-ba9943b21378a47aa641e32ef14a46f7.png">
						<img alt="ネットショップオーナーのためのオリジナルグッズ作成サービス" class="hidden-xs" id="txt_header" src="./img/txt_header-778beeb90c8d8ca6a1000bc68b707eab.png">
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a class="hatena" href="https://support.canvath.jp/hc/ja" target="_blank">よくある質問</a>
						</li>
						<li>
							<a class="about" href="http://blog.canvath.jp/guide/" target="_blank">使い方ガイド</a>
						</li>
						<li>
							<a class="about_size" href="https://www.canvath.jp/about_size" target="_blank">対応機種・素材・サイズ</a>
						</li>
						<li>
							<a class="login" href="https://www.canvath.jp/signin">
                    ログイン
</a> </li>
					</ul>
				</div>
			</div>
		</div>
	</header>


	<section id="material_simulate">
		<div class="container">
			<span class="h_circle">
      <i class="fa fa-film"></i>
    </span>
			<h1>表面のみ印刷スマホケース画像</h1>


			<form action="https://www.canvath.jp/materials/587f125763616e70f3280200/simulate#" id="orderForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<div class="row devise" id="uvphonecase">
					<div class="col-md-7">
						<div id="emulator-box">
							<div id="emulator-wrap">
								<!-- 機種ごとに合成部分の処理をわける -->
								<!-- 画像の合成部分の処理-->
								<div id="emulator">
									<div id="imgBackground" style="width: 300px; height: 528px; opacity: 1;" class="back">
										<img alt="1457500542882" height="auto" id="uploadImage" src="" width="auto" class="ui-draggable imgView" style="position: relative; width: 340px; height: auto; top: 0px; left: 0px;">
									</div>
									<div id="itemView" class="uvphonecase_ip7_white"></div>
								</div>

								<!-- メニューの処理-->

								<div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
									<a class="ui-slider-handle ui-state-default ui-corner-all" href="javascript:void(0);" style="left: 44.898%;"></a>
								</div>
							</div>
						</div>
					</div>



					<div class="col-md-4 detail">
						<h2><i class="fa fa-th-large"></i>背景画像アップロード</h2>
						<div style="margin:0;padding:0;display:inline" class="imgInput">
							<input type="file" class="btn btn-lg btn-primary btn-wide btn-convert">
						</div>
						<h2><i class="fa fa-th-large"></i>画像タイトル</h2>
						<div style="margin:0;padding:0;display:inline">
							<input name="_method" type="hidden" value="patch">
							<input name="authenticity_token" type="hidden" value="Xqovtkk4eO5XJQaRAmQSHp73982kxMgJlUB5gAt+SeQ=">
						</div>
						<div class="row">
							<div class="col-md-12">
								<input class="form-control" id="material_name" name="material[name]" placeholder="タイトル名を入力" type="text">
							</div>
						</div>


						<!-- 機種ごとにメニューをわける -->
						<!-- 画像の合成部分の処理-->
						<h2><i class="fa fa-th-large"></i>機種を選択</h2>
						<select class="form-control order-key" id="wakus" name="uvphonecase_key">
						<?php
						foreach($waku_list as $key => $val){
								echo "<option value=\"".$val[1]."\">".$val[0]."</option>";
						}
						?>
						</select>
						<p class="commodity_price">
							¥<strong class="price">900</strong>
							<span>(税込)</span>
						</p>
						<p class="aleart">
							表面のみ印刷スマホケースは側面への印刷を行わないため、側面部分はポリカーボネート樹脂（プラスティック）の白色か透明となります。
							<br> なお、赤色の線まで画像データが届いていない箇所も、印刷を行わないため素材の白色か透明のままとなりますのでご注意ください。
						</p>


						<div class="order_option">
							<a class="btn btn-lg btn-primary btn-wide btn-convert" href="javascript:void(0);">保存する</a>
						</div>
					</div>
				</div>
			</form>


			<p class="attention">
				<img alt="オリジナルグッズ" src="./img/info-2aab2045b12a86cf2ee2fcc9bc0b9e99.png">
				<a href="https://www.canvath.jp/about_size#uvphonecase" target="_blank">表面のみ印刷スマホケースの素材・サイズ</a>
				<br>
				<img alt="オリジナルグッズ" src="./img/info-2aab2045b12a86cf2ee2fcc9bc0b9e99.png">
				<a href="http://blog.canvath.jp/originalgoods/uvphonecase/" target="_blank">表面のみ印刷スマホケースのサンプルイメージ</a>
			</p>
		</div>

		<form accept-charset="UTF-8" action="https://www.canvath.jp/materials/587f125763616e70f3280200/convert" data-no-turbolink="true" id="convert_form" method="post">
			<div style="margin:0;padding:0;display:inline">
				<input name="authenticity_token" type="hidden" value="Xqovtkk4eO5XJQaRAmQSHp73982kxMgJlUB5gAt+SeQ=">
			</div>
			<input id="devise" name="devise" type="hidden" value="uvphonecase">
			<input id="key" name="key" type="hidden" value="uvphonecase_ip6_white">
			<input id="type" name="type" type="hidden" value="">
			<input id="cut" name="cut" type="hidden" value="">
			<input id="printPosition" name="printPosition" type="hidden" value="">
			<input id="size" name="size" type="hidden" value="">
			<input id="width" name="width" type="hidden" value="797">
			<input id="height" name="height" type="hidden" value="478">
			<input id="top" name="top" type="hidden" value="31">
			<input id="left" name="left" type="hidden" value="-335">
			<input id="name" name="name" type="hidden" value="">
			<input id="orientation" name="orientation" type="hidden" value="">
		</form>
	</section>

	<footer id="globalfooter">
		<div class="container">
			<nav role="navigation" aria-label="canvath グローバルナビゲーション" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
				<h1 role="presentation">
        <img alt="Logo w" src="./img/logo_w-42e997e43048ea1cbdfb6adf801739ba.png">
      </h1>
				<ul class="row">
					<li>
						<a href="https://www.canvath.jp/about">Canvathについて</a>
					</li>
					<li>
						<a href="http://blog.canvath.jp/guide/" target="_blank">使い方ガイド</a>
					</li>
					<li>
						<a href="https://support.canvath.jp/hc/ja" target="_blank">よくある質問</a>
					</li>
					<li>
						<a href="https://www.canvath.jp/about_size">対応機種・素材・サイズ</a>
					</li>
					<li>
						<a href="https://www.canvath.jp/transaction">特定商取引法に基づく表示</a>
					</li>
					<li>
						<a href="https://www.canvath.jp/terms">利用規約</a>
					</li>
					<li>
						<a href="https://www.canvath.jp/privacy_policy">プライバシーポリシー</a>
					</li>
					<li>
						<a href="https://support.canvath.jp/hc/ja/requests/new" target="_blank">お問い合わせ</a>
					</li>
				</ul>
			</nav>
			<div id="copyright">©
				<span itemprop="name">Canvath </span>
				<span itemprop="copyrightYear">2017</span>
			</div>
			<div class="social">
				<a href="https://twitter.com/canvath" target="_blank">
					<img alt="Twitter" src="./img/twitter-126b65035705eb61c0a94521031f4faf.png">
				</a>
				<a href="https://www.facebook.com/canvath" target="_blank">
					<img alt="Facebook" src="./img/facebook-f783a76a6e75733af6fffaff309f35a9.png">
				</a>
			</div>
		</div>
	</footer>

	<div class="item" style="display:none;">
		<div="item_loading"=""></div>
	</div>


	<div id="fb-root" class=" fb_reset">
		<div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
		</div>
		<div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
			<div></div>
		</div>
	</div>

<div id="output_screen">
  <img id="screen_image" class="alphaImage">
</div>
<div id="output_screen2">
  <img id="screen_image2" class="alphaImage">
</div>
<input type="hidden" id="wresult" name="wresult" value="0">
<input type="hidden" id="hresult" name="hresult" value="0">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>
    var $j = jQuery.noConflict();
$j(function(){
    var setFileInput = $j('.imgInput');
 	
    setFileInput.each(function(){
        var selfFile = $j("#imgBackground"),
        selfInput = $j(this).find('input[type=file]');
        
        selfInput.change(function(){
            var file = $j(this).prop('files')[0],
            fileRdr = new FileReader(),
            selfImg = selfFile.find('.imgView');
 			$j(".downloadButton2").css("display","inline");
            if(!this.files.length){
                if(0 < selfImg.size()){
                    selfImg.remove();
                    return;
                }
            } else {
                if(file.type.match('image.*')){
                    if(!(0 < selfImg.size())){
                       // selfFile.append('<img alt="" class="imgView">');
        				//$("#demo").before("<div id=\"back\"><img style=\"width:500px;\" class=\"imgView\"></div>");
                    }
                    var prevElm = selfFile.find('.imgView');
                    fileRdr.onload = function() {
                        prevElm.attr('src', fileRdr.result);
                    }
                    fileRdr.readAsDataURL(file);
                } else {
                    if(0 < selfImg.size()){
                        selfImg.remove();
                        return;
                    }
                }
                $('#uploadImage').css({'width': '300px', 'height': 'auto'});
            }
        });
    });
});
</script>
<script type="text/javascript">
    var $j = jQuery.noConflict();
$j(document).ready(function() {

	
    $j('#wakus').change(function() {
    	var waku = $j(this).val();
        $j('#main').css("width","198px");
        $j('#main').css("height","400px");
        //console.log(waku);
        $j("#itemView").html("<img src=\""+waku+"\" style=\"width:198px;\" id=\"demoimg\">");
        $j("#shot").css("display","inline");
    });
    
 	$j('#itemView,#imgBackground')
    .mouseover(function(e) {
      $j("#itemView").css("z-index","5");
      $j("#imgBackground").css("z-index","10");
    })
    .mouseout(function(e) {
      $j("#itemView").css("z-index","10");
      $j("#imgBackground").css("z-index","1");
    });
    

});
</script>
<SCRIPT language="JavaScript">
<!--
(function(){

	 $('#uploadImage').draggable(
      {
        stop: function (ui) {
          if (isNaN(x) || isNaN(NaN)) {
            return;
          }
          x = ui.position.left;
          y = ui.position.top;
        },
        scroll: false
      }
    );
/*
    //要素の取得
    var elements = document.getElementsByClassName("back");

    //要素内のクリックされた位置を取得するグローバル（のような）変数
    var x;
    var y;

    //マウスが要素内で押されたとき、又はタッチされたとき発火
    for(var i = 0; i < elements.length; i++) {
        elements[i].addEventListener("mousedown", mdown, false);
        elements[i].addEventListener("touchstart", mdown, false);
    }

    //マウスが押された際の関数
    function mdown(e) {
        //クラス名に .drag を追加
        this.classList.add("drag");

        //タッチデイベントとマウスのイベントの差異を吸収
        if(e.type === "mousedown") {
            var event = e;
        } else {
            var event = e.changedTouches[0];
        }

        //要素内の相対座標を取得
        x = event.pageX - this.offsetLeft;
        y = event.pageY - this.offsetTop;

        //ムーブイベントにコールバック
        document.body.addEventListener("mousemove", mmove, false);
        document.body.addEventListener("touchmove", mmove, false);
    }

    //マウスカーソルが動いたときに発火
    function mmove(e) {

        //ドラッグしている要素を取得
        var drag = document.getElementsByClassName("drag")[0];

        //同様にマウスとタッチの差異を吸収
        if(e.type === "mousemove") {
            var event = e;
        } else {
            var event = e.changedTouches[0];
        }

        //フリックしたときに画面を動かさないようにデフォルト動作を抑制
        e.preventDefault();

        //マウスが動いた場所に要素を動かす
        drag.style.top = event.pageY - y + "px";
        drag.style.left = event.pageX - x + "px";

        //マウスボタンが離されたとき、またはカーソルが外れたとき発火
        drag.addEventListener("mouseup", mup, false);
        document.body.addEventListener("mouseleave", mup, false);
        drag.addEventListener("touchend", mup, false);
        document.body.addEventListener("touchleave", mup, false);

    }

    //マウスボタンが上がったら発火
    function mup(e) {
        var drag = document.getElementsByClassName("drag")[0];

        //ムーブベントハンドラの消去
        document.body.removeEventListener("mousemove", mmove, false);
        drag.removeEventListener("mouseup", mup, false);
        document.body.removeEventListener("touchmove", mmove, false);
        drag.removeEventListener("touchend", mup, false);

        //クラス名 .drag も消す
        drag.classList.remove("drag");
    }
*/
})()
//-->
</SCRIPT>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="jquery.alphaimage.js"></script>
<SCRIPT language="JavaScript">
<!--
function screenshot( selector) {
	$j(".downloadButton").css("display","none");
	var getCanvas; 
    var element = $j(selector)[0];
    html2canvas(element, { onrendered: function(canvas) {
        var imgData = canvas.toDataURL();
        getCanvas = canvas;
        $j.post("./convert.php?mode=img",{ img: imgData }).done(function(res) {
			console.log("=>"+res);
		});
        $j('#screen_image')[0].src = imgData;
        //$j('#download')[0].href = imgData;
        //$j('#download')[0].innerHTML = "ダウンロード";
        $j(".downloadButton").css("display","inline");
            $j('.alphaImage').alphaimage({
                colour: "#ffffff"
            });
    }});
    //screenshot2( selector);
}
function screenshot2( selector) {
	$j("#demo").css("display","none");
	var getCanvas; 
    var element = $j(selector)[0];
    html2canvas(element, { onrendered: function(canvas) {
        var imgData = canvas.toDataURL();
        getCanvas = canvas;
        $j.post("./convert.php?mode=img2",{ img2: imgData }).done(function(res) {
			console.log("=>"+res);
		});
        $j('#screen_image2')[0].src = imgData;
        $j(".downloadButton").css("display","inline");
            $j('.alphaImage').alphaimage({
                colour: "#ffffff"
            });
    }});
	$j("#demo").css("display","block");
}



function erase_screenshot() {
    $j('#screen_image')[0].src = "";
    $j('#screen_image2')[0].src = "";
    $j('#download')[0].href = "#";
    $j('#download')[0].innerHTML = "";
}
//-->
</SCRIPT>
    <script>
        $j(document).ready(function (){
            $j('.alphaImage').alphaimage({
                colour: "#ffffff"
            });
            //背景画像
            $j("#big").click(function(){
            	var b = $j('#imgView');
            	var w = b.width()+10
            	$j("#imgView").css("width",w);
            });
            $j("#small").click(function(){
            	var b = $j('#imgView');
            	var w = b.width()-10
            	$j("#imgView").css("width",w);
            });
            	
            	
        });
	(function($){
		$(function() {	
			$('.downloadButton a').on('click', function(e){
				
				var hrefPath = $(this).attr('href');		
				var fileName = $(this).attr('href').replace(/\\/g,'/').replace( /.*\//, '' );
				
				$target = $(e.target);
				$target.attr({
					download: fileName,
					href: hrefPath
				});
				
			});

		});
	})(jQuery);
    </script>
		
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>

    <script>
	(function($){
		
	var designHeight,designWidth;

	$j('#slider').slider({
      min: 10,
      max: 255,
      range: false,
      value: 120,
      orientation: 'horizontal',
      change: function (e, ui) {
        setRange(ui.value);
      },
      slide: function (e, ui) {
        setRange(ui.value);
      }
    });
	function setRange(val) {
		if($("#wresult").val() == 0){
			var obj = $("#uploadImage").get(0);
			designWidth = $("#uploadImage").width();
			designHeight= $("#uploadImage").height();
			$("#wresult").val(designWidth);
			$("#hresult").val(designHeight);
		}else{
			designWidth = $("#wresult").val();
			designHeight= $("#hresult").val();
		}
      imgWidthZoom = val * 0.01 * designWidth;
      imgHeightZoom = val * 0.01 * designHeight;
      $('#uploadImage').css({'width': imgWidthZoom, 'height': imgHeightZoom});
    }
	})(jQuery);
    </script>
</body>

</html>
