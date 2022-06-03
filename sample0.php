<?php
header("Content-Type: text/html; charset=utf-8");
header("Expires: Thu, 01 Dec 1994 16:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s"). " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


$waku_list=array(
"iPhone7hardcase_black_touka",
"iPhone7hardcase_clear_touka",
"iPhone7hardcase_white_touka",
"iPhone7taishougeki_clear_touka",
"iPhone7TPUcase_clear_touka",
"iPhone6hardcase_black_touka",
"iPhone6hardcase_clear_touka",
"iPhone6hardcase_white_touka",
"iPhone6metallicTPU_gold_touka",
"iPhone6metallicTPU_pink_touka",
 ); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css">
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
<header id="header" class="clearfix"></header>
<div id="wrapper" class="clearfix"> 
	
	<div class="w">
		
		<div id="main" class="main">
			<div id="contents"><div id="nuki"></div></div>
				<div id="back" class="back"><img class="imgView" name="img1" id="imgView" style="width:auto;">
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
		<div id="slider" class="downloadButton2"></div>
		<input type="hidden" name="wresult" id="wresult" value="0">
		<input type="hidden" id="hresult" name="hresult" value="0">
	</div>
	<div class="w">
		<div id="head">
			<div class="imgInput">
				<p>背景画像：
				<input type="file"></p>
				<p>枠デザイン:
				<select name="waku" id="wakus">
					<option value="">選択してください。</option>
					<?php foreach($waku_list as $key=> $val){ echo "<option value=\"".$val. "\">".$val."</option>"; } ?>
				</select>
				</p>
				<div>
					<p class="names">背景画像ファイル名:<input type="text" name="backimg" id="backimg" value=""></p>
					<p class="names">枠　画像ファイル名:<input type="text" name="wakuimgs" id="wakuimgs"  value=""></p>
					<p class="names">合成枠画像ファイル名:<input type="text" name="wakuimgs2" id="wakuimgs2"  value=""></p>
					<p><button onclick="screenshot('#main');" id="shot">スナップショット</button></p>
					<div style="display:inline;" id="loader"><img src="loading_6.gif" style="width:100px;"></div>
					<p class="downloadButton"><a id="download1" href="./convert/test2.png" download="test.png">背景画像ダウンロード</a></p>
					<p class="downloadButton"><a id="download2" href="./convert/test.png" download="test.png">枠画像ダウンロード</a></p>
					<p class="downloadButton"><a id="download3" href="./convert/test.png" download="test.png">合成枠画像ダウンロード</a></p>
					
				</div>

			</div>
		</div>
	</div>
</div>

<footer id="footer"> 

</footer>



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
					$j(".downloadButton2").css("display", "block");
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
				$j("#demo").html("<img src=\"./files/" + waku + ".png\" id=\"wakuimg\" style=\"width:278px;\">");
				$j("#shot").css("display", "block");
				$j(".names").css("display", "block");
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
					/*$j("#imgView").css("position", "fixed");*/
				})
				// マウスポインターが画像から外れた時の動作
				.mouseout(function(e) {
					$j("#demo").css("z-index", "5");
					$j("#contents").css("z-index", "4");
					$j("#imgView").css("z-index", "1");
					$j("#imgView").css("opacity", "1");
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
					var name = $j("#wakuimgs").val();
					var name2 = $j("#wakuimgs2").val();
					$j.post("./convert.php?mode=img", {
						img: imgData,name:name,name2:name2
					}).done(function(res) {
						console.log(res);
						screenshot2(selector);
						$j('#download2').attr('href', "./convert/"+name+".png");
						$j('#download3').attr('href', "./convert/"+name2+".png");
					});
					$j('#screen_image')[0].src = imgData;
					$j('.alphaImage').alphaimage({
						colour: "#ffffff"
					});
				}
			});
		}

		function screenshot2(selector) {
			console.log("go");
			for (var i = 0; i <= 500; i++) {
				//console.log(i);
			}
			$j("#wakuimg").css("display", "none");
			var getCanvas;
			var element = $j(selector)[0];
			html2canvas(element, {
				onrendered: function(canvas) {
					var imgData2 = canvas.toDataURL();
					getCanvas = canvas;
					var name = $j("#backimg").val();
					$j.post("./convert.php?mode=img2", {
						img2: imgData2,name:name
					}).done(function(res) {
						$j(".downloadButton").css("display", "inline");
						$j("#wakuimg").css("display", "block");
						$j("#loader").css("display", "none");
						$j('#download1').attr('href', "./convert/"+name+".png");
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
