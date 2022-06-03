<?php 
$waku_list=array(
 "iPhone7TPUcase_clear_touka.png",
 "iPhone7taishougeki_clear_touka.png",
 "iPhone6hardcase_black_touka.png",
 "iPhone6hardcase_clear_touka.png",
 "iPhone6hardcase_white_touka.png",
 "iPhone7hardcase_black_touka.png",
 "iPhone7hardcase_clear_touka.png",
 "iPhone7hardcase_white_touka.png",
 ); 
$back_list=array( "fotolia_92255158.jpg",
 "fotolia_124573070.jpg",
 "fotolia_124573091.jpg",
 "fotolia_128468729.jpg",
 );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style type="text/css">
		<!-- #head {
			position: absolute;
			top: 0;
			z-index: 100;
		}
		#contents{
			position: absolute;
			width:1000px;
			height:692px;
			top:-10px;
			left:-327px;
			background-image   : url(backimg.png),url(backimg.png);
			background-position: left top,right top;
			background-repeat  : no-repeat,no-repeat;
			z-index:0;
		}
		#main {
			position: relative;
			padding-top: 30px;
			margin: 30px auto;
			height: 662px;
			width: 347px;
			top: 50px;
		}
		.demo {
			width: 350px;
			overflow: hidden;
			cursor: -webkit-grab;
			position: absolute;
			top: 0px;
			left: -2px;
		}
		#shot {
			display: none;
		}
		#output_screen {
			top: -1000px;
			position: absolute;
		}
		#output_screen2 {
			top: -1000px;
			position: absolute;
			left: 500px;
		}
		#back {
			width: 600px;
			position: absolute;
			top:-10px;
			height:692px;
			left:-120px;
		}
		.imgInput {
			padding-left: 10px;
		}
		.downloadButton {
			width: 200px;
			display: none;
		}
		.downloadButton2 {
			width: 150px;
			display: none;
		}
		.imgView{
			overflow:hidden;
		}
		#monitor {
			box-sizing: border-box;
			position: absolute;
			top: 50%;
			left: 0;
			right: 0;
			margin: -130px auto 0;
			border-radius: 10px;
			width: 120px;
			height: 60px;
			color: rgba(255, 255, 255, .9);
			font: 20px AvenirNext-Heavy;
			line-height: 60px;
			text-align: center;
			background: rgba(0, 0, 0, .9);
			box-shadow: 0 0 2px rgba(0, 0, 0, 1) inset;
		}
		#monitor:before {
			display: block;
			position: absolute;
			left: 50%;
			bottom: -20px;
			margin-left: -10px;
			border: solid 10px rgba(0, 0, 0, 0);
			border-top-color: rgba(0, 0, 0, .9);
			width: 0;
			height: 0;
			content: "";
		}
		#container {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
			border-radius: 10px;
			width: 320px;
			height: 80px;
			background: #6e6e6e;
			box-shadow: 0 0 2px rgba(0, 0, 0, .2) inset;
		}
		#slider {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			outline: none;
			border: 1px solid;
			-webkit-tap-highlight-color: transparent;
			position: absolute;
			top: -10px;
			left: 680px;
			margin: -5px 0 0 (-125px + -22px);
			width: 250px + 44px;
			height: 10px;
			/*opacity: 0;*/
			
			cursor: pointer;
		}
		@mixin slider-thumb {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			border-radius: 50%;
			width: 44px;
			height: 44px;
			cursor: pointer;
		}
		#slider::-webkit-slider-thumb {
			@include slider-thumb;
		}
		#slider::-moz-range-thumb {
			@include slider-thumb;
		}
		#slider::-ms-thumb {
			@include slider-thumb;
		}
		#gutter {
			position: absolute;
			top: 50%;
			left: 50%;
			margin: -5px 0 0 -125px;
			border-radius: 5px;
			width: 250px;
			height: 10px;
			background: #3e3e3e;
			box-shadow: 0 0 2px rgba(0, 0, 0, .8) inset;
			pointer-events: none;
		}
		#bar {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			margin: auto;
			width: 0;
			height: 10px;
			border-radius: 5px;
			background: #e91e63;
			box-shadow: 0 0 2px rgba(0, 0, 0, .8) inset;
		}
		#knob {
			position: absolute;
			top: 50%;
			left: 0;
			margin: -22px 0 0 -22px;
			border-radius: 50%;
			width: 44px;
			height: 44px;
			background: #8e8e8e;
			box-shadow: 0 0 2px rgba(0, 0, 0, .2);
			cursor: pointer;
		}
		//-->

	</style>
	<style>
		#slider {
			width: 300px;
			margin: 20px;
		}
		#slider .ui-slider-range {
			background: #E38692;
		}
		#slider .ui-slider-handle {
			border-color: #c0c0c0;
			background: #E38692;
			border-radius: 10px;
			moz-border-radius: 10px;
			-webkit-border-radius: 10px;
		}
		.ui-slider-horizontal {
			height: 0.3em;
		}
		.ui-slider-horizontal .ui-slider-handle {
			top: -.5em;
			margin-left: -.6em;
		}

	</style>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
	<script>
		function refreshSwatch() {
			var slider = $("#slider").slider("value");
			var val = parseInt(slider) - 50;
			if (w === undefined) {
				if ($("#wresult").val() == 0) {
					var b = $('#imgView');
					var c = b.width();
					$("#wresult").val(c);
					var w = c + (val * 10);
				} else {
					var w = parseInt($("#wresult").val()) + (val * 10);
				}
			}
			if (w) {
				$("#imgView").css("width", w);
			}
		}
		$(function() {
			$("#slider").slider({
				orientation: "horizontal",
				range: "min",
				max: 100,
				value: 50,
				slide: refreshSwatch,
				change: refreshSwatch
			});
			$("#slider").slider("value", 50);
		});

	</script>

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
				if (!flag) return;
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
			背景画像：
			<input type="file"> &nbsp;&nbsp; 枠デザイン:
			<select name="waku" id="wakus">
				<option value="">選択してください。</option>
				<?php foreach($waku_list as $key=> $val){ echo "<option value=\"".$val. "\">".$val."</option>"; } ?>
			</select>

			&nbsp;&nbsp;
			<!--p class="downloadButton"><a href="./convert/test.ai" download="test.png">aiダウンロード</a></p>
	&nbsp;&nbsp;<p class="downloadButton"><a href="./convert/test.eps" download="test.png">epsダウンロード</a></p-->
			<div id="slider" class="downloadButton2"></div>
			<input type="hidden" name="wresult" id="wresult" value="0">
			<div>
				&nbsp;&nbsp;
				<button onclick="screenshot('#main');" id="shot">スナップショット</button>
				&nbsp;&nbsp;
				<p class="downloadButton"><a id="download" href="./convert/test2.png" download="test.png">背景画像ダウンロード</a>
				</p>
				&nbsp;&nbsp;
				<p class="downloadButton"><a href="./convert/test.png" download="test.png">枠画像ダウンロード</a>
				</p>
				<div style="display:inline;" id="loader"><img src="loading_6.gif" style="width:100px;">
				</div>
			</div>

		</div>
	</div>
	<div id="main" class="main">
			
		<div id="contents"><div id="nuki"></div></div>
			<div id="back" class="back"><img class="imgView" name="img1" id="imgView">
			</div>
			<div class="demo" id="demo"></div>
			<!--img src="iphone1.png" style="position: absolute;top: 14px;left: 0px;opacity: 0.8;"-->
		
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
		$j(function() {

			$j("#loader").css("display", "none");
			var setFileInput = $j('.imgInput');

			setFileInput.each(function() {
				var selfFile = $j("#back"),
					selfInput = $j(this).find('input[type=file]');

				selfInput.change(function() {
					var file = $j(this).prop('files')[0],
						fileRdr = new FileReader(),
						selfImg = selfFile.find('.imgView');
					$j(".downloadButton2").css("display", "inline");
					if (!this.files.length) {
						if (0 < selfImg.size()) {
							selfImg.remove();
							return;
						}
					} else {
						if (file.type.match('image.*')) {
							if (!(0 < selfImg.size())) {
								// selfFile.append('<img alt="" class="imgView">');
								//$("#demo").before("<div id=\"back\"><img style=\"width:500px;\" class=\"imgView\"></div>");
							}
							var prevElm = selfFile.find('.imgView');
							fileRdr.onload = function() {
								prevElm.attr('src', fileRdr.result);
							}
							fileRdr.readAsDataURL(file);
						} else {
							if (0 < selfImg.size()) {
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
				$j("#demo").html("<img src=\"" + waku + "\" id=\"wakuimg\" style=\"width:350px;\">");
				$j("#shot").css("display", "inline");
			});
		});

	</script>
	<SCRIPT language="JavaScript">
		<!--
		(function() {

			$('#main')
				// マウスポインターが画像に乗った時の動作
				.mouseover(function(e) {
					$j("#demo").css("z-index", "1");
					$j("#contents").css("z-index", "1");
					$j("#imgView").css("z-index", "5");
					$j("#imgView").css("opacity", "0.8");
					$j("#imgView").css("position", "fixed");
				})
				// マウスポインターが画像から外れた時の動作
				.mouseout(function(e) {
					$j("#demo").css("z-index", "5");
					$j("#contents").css("z-index", "4");
					$j("#imgView").css("z-index", "1");
					$j("#demo").css("opacity", "1");
				});

	 $('#imgView').draggable(
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
			for (var i = 0; i < elements.length; i++) {
				elements[i].addEventListener("mousedown", mdown, false);
				elements[i].addEventListener("touchstart", mdown, false);
			}

			//マウスが押された際の関数
			function mdown(e) {
				//クラス名に .drag を追加
				this.classList.add("drag");

				//タッチデイベントとマウスのイベントの差異を吸収
				if (e.type === "mousedown") {
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
				if (e.type === "mousemove") {
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
		function screenshot(selector) {
			$j("#loader").css("display", "inline");
			$j(".downloadButton").css("display", "none");
			var getCanvas;
			var element = $j(selector)[0];
			html2canvas(element, {
				onrendered: function(canvas) {
					var imgData = canvas.toDataURL();
					getCanvas = canvas;
					$j.post("./convert.php?mode=img", {
						img: imgData
					}).done(function(res) {
						screenshot2(selector);
					});
					$j('#screen_image')[0].src = imgData;
					//$j('#download')[0].href = imgData;
					//$j('#download')[0].innerHTML = "ダウンロード";
					//$j(".downloadButton").css("display","inline");
					$j('.alphaImage').alphaimage({
						colour: "#ffffff"
					});
				}
			});
		}

		function screenshot2(selector) {
			console.log("go");
			for (var i = 0; i <= 500; i++) {
				console.log(i);
			}
			$j("#wakuimg").css("display", "none");
			var getCanvas;
			var element = $j(selector)[0];
			html2canvas(element, {
				onrendered: function(canvas) {
					var imgData2 = canvas.toDataURL();
					getCanvas = canvas;
					$j.post("./convert.php?mode=img2", {
						img2: imgData2
					}).done(function(res) {
						$j(".downloadButton").css("display", "inline");
						$j("#wakuimg").css("display", "block");
						$j("#loader").css("display", "none");
					});
					$j('#screen_image2')[0].src = imgData2;
					$j('.alphaImage').alphaimage({
						colour: "#ffffff"
					});
				}
			});

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
		$j(document).ready(function() {
			$j('.alphaImage').alphaimage({
				colour: "#ffffff"
			});


		});



		(function($) {
			$(function() {
				$('.downloadButton a').on('click', function(e) {

					var hrefPath = $(this).attr('href');
					var fileName = $(this).attr('href').replace(/\\/g, '/').replace(/.*\//, '');

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
