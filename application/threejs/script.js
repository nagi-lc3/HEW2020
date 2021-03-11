/*
	Jquery基本構文
	HTML(Document)の要素を操作するためのオブジェクトが用意されている
	JQueryではDocumentの要素を次のようにオブジェクトとして指定する．

	$("要素名")	・・・DOMをJQueryで指定する.
	$('要素名').メソッド	・・・指定したDOMを処理するメソッドの呼び出し

	JQueryのコードは$(function(){・・・・});に記述する．
	$(function(){・・・・});は何を意味しているのか？
	JQuery(function(){・・・・});と書いてもOK

	ドキュメント(HTML)の読み込みを待ってからJQueryコードを実行するための記述
	$(); / JQuery();・・・ドキュメントの読み込み待ち
	function(){・・・}	・・・コードを実行する
*/

$();

$(function(){
	$("button").html("Click");
	// buttonをクリックする．
	$("button").click(function(){
		// クリック時の動作を書く
		// buttonを5秒でfadeOutさせる．
		// $("button").fadeOut(5000);	でも可
		$(this).fadeOut(5000);
	});
});
