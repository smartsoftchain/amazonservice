<?php
$waku_list = array(
	"tests.png",
	/*"iPhone7TPUcase_clear_touka.png",
	"iPhone7taishougeki_clear_touka.png",
	"iPhone6hardcase_black_touka.png",
	"iPhone6hardcase_clear_touka.png",
	"iPhone6hardcase_white_touka.png",
	"iPhone6metallicTPU_gold_notouka.png",
	"iPhone6metallicTPU_pink_notouka.png",
	"iPhone7hardcase_black_touka.png",
	"iPhone7hardcase_clear_touka.png",
	"iPhone7hardcase_white_touka.png",*/
	
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<div id="head">
<div class="imgInput">
枠デザイン:<select name="waku" id="wakus">
<option value="">選択してください。</option>
<?php
foreach($waku_list as $key => $val){
		echo "<option value=\"".$val."\">".$val."</option>";
}
?>
</select>&nbsp;&nbsp;
背景画像：<input type="file">


	&nbsp;&nbsp;<button onclick="screenshot('#main')" id="shot">スナップショット</button>
	&nbsp;&nbsp;<p class="downloadButton"><a id="download" href="#" download="test.png"></a></p>
	&nbsp;&nbsp;<p class="downloadButton"><a href="./convert/test.png" download="test.png">pngダウンロード</a></p>

	&nbsp;&nbsp;<!--p class="downloadButton"><a href="./convert/test.ai" download="test.png">aiダウンロード</a></p>
	&nbsp;&nbsp;<p class="downloadButton"><a href="./convert/test.eps" download="test.png">epsダウンロード</a></p-->
	<p class="downloadButton2"><input type="button" id="big" value="背景画像を大きく"></p>
	<p class="downloadButton2"><input type="button" id="small" value="背景画像を小さく"></p>
</div>
	</div>
<div id="main" class="main">
	<div id="back" class="back"><img class="imgView" name="img1" id="imgView" style="width:198px;"></div>
	<div class="demo" id="demo"></div>
</div>
<div id="output_screen">
  <img id="screen_image" class="alphaImage">
</div>
<div id="output_screen2">
  <img id="screen_image2" class="alphaImage">
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>
    var $j = jQuery.noConflict();
$j(function(){
    var setFileInput = $j('.imgInput');
 
    setFileInput.each(function(){
        var selfFile = $j("#back"),
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
    	//console.log(waku);
    	//var src = $j("#imgView").attr("src");
    	//var backs = $("#backs").val();
        //$j('#main').css("background-image","url("+src+")");
        //$j('#imgView').css("display","none");
        //$('#main').css("background-size","400px");
        //$("#back").remove();
        //$("#demo").before("<img id=\"back\" src=\"ruffy.png\" style=\"width:500px;\">");
        //$('#main').css("background-image","url("+backs+")");
        $j('#main').css("width","198px");
        $j('#main').css("height","400px");
        //console.log(waku);
        $j("#demo").html("<img src=\""+waku+"\" style=\"width:198px;\" id=\"demoimg\">");
        $j("#shot").css("display","inline");
    });
    
 	$j('#demo,#back')
    .mouseover(function(e) {
      $j("#demo").css("z-index","5");
      $j("#back").css("z-index","10");
    })
    .mouseout(function(e) {
      $j("#demo").css("z-index","10");
      $j("#back").css("z-index","1");
    });
    
    
});
</script>
<SCRIPT language="JavaScript">
<!--
(function(){

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
</body>
</html>