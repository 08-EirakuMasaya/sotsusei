$(function(){
	var li_move = 1;
	$("#carouselwrap").append('<div id="prev" class="hide"></div><div id="next" class="show"></div>');
	// カルーセル要素の幅を取得
	var carousel_wid = $("#result").width();
	// liのpaddingを含む幅を取得
	var li_wid = $("#result_carousel li").outerWidth();//[.outerWidth()]bprder,paddingまでふくめた長さを取得、オプションでmarginも
	// liの数を取得
	var li_num = $("#result_carousel li").length;
	// ulの幅を計算(liを全部横に並べた幅)
	var ul_wid = li_wid*li_num;
	// ulにスタイルを追加
	$('#result_carousel ul').css({
		position: 'absolute',
		top: '0',
		left: '0',
		width: ul_wid+'px'
	});
	$('#prev').click(function(){
		// prevをクリックしたときにclass=hideが指定されていなければ、以下を実行
		if($(this).attr("class") !== "hide") {//「.attr()」指定した属性の値を取得、指定するのは属性
			// ulの:not(:animated)はアニメーションしてないulをセレクトしている)
			$('#result_carousel ul:not(:animated)').animate(
				{left:'+='+li_wid*li_move},
				600,
				function(){
					// アニメーションが完了したらulのposition-leftの位置を取得
					var ul_pos = boxPosition("#result_carousel ul","left");
					// nextのclassを「show」に書き換え
					$('#next').attr("class","show");
					// ulのposition-leftが0の場合、prevのclassを「hide」に書き換え
					if(ul_pos === 0) {
						$('#prev').attr("class","hide");
					}
				}
			);
		}
	});
	$('#next').click(function(){
		// nextをクリックしたときにclass=hideが指定されていなければ、以下を実行（以下略）
		if($(this).attr("class") !== "hide") {
			$('#result_carousel ul:not(:animated)').animate(
				{left:'-='+li_wid*li_move},
				600,
				function(){
					var ul_pos = boxPosition("#result_carousel ul","left");
					$('#prev').attr("class","show");
					if(carousel_wid > (ul_wid+ul_pos)) {
						$('#next').attr("class","hide");
					}
				}
			);
		}
	});
	function boxPosition(ele,pos) {
	 	// 指定されたエレメントのpositionの各値を取得
		var position = $(ele).position();
		// 指定された位置の値をリターン
		return position[pos];
	}
});
