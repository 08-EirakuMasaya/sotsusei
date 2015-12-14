<?php
	
/**
 * Yahoo! JAPAN Web APIのご利用には、アプリケーションIDの登録が必要です。
 * あなたが登録したアプリケーションIDを $appid に設定してお使いください。
 * アプリケーションIDの登録URLは、こちらです↓
 * http://e.developer.yahoo.co.jp/webservices/register_application
 */
$appid = 'dj0zaiZpPUtrUzlYZm9rQzdaQyZzPWNvbnN1bWVyc2VjcmV0Jng9MTM-'; // <-- ここにあなたのアプリケーションIDを設定してください。

function escapestring($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}
	
if(isset($_REQUEST['sentence'])){
  $sentence = mb_convert_encoding($_REQUEST['sentence'], 'utf-8', 'auto');
 }else{
  $sentence = "";
}

function show_keyphrase($appid, $sentence){
  $output = "xml";
  $request  = "http://jlp.yahooapis.jp/KeyphraseService/V1/extract?";
  $request .= "appid=".$appid."&sentence=".urlencode($sentence)."&output=".$output;
  
  $responsexml = simplexml_load_file($request);
  
  $result_num = count($responsexml->Result);

  if($result_num > 0){
    echo "<table>";
    echo "<tr><td><b>キーフレーズ</b></td><td><b>スコア</b></td></tr>";

    for($i = 0; $i < $result_num; $i++){
      $result = $responsexml->Result[$i];
      echo "<tr><td>".escapestring($result->Keyphrase)."</td><td>".escapestring($result->Score)."</td></tr>";
    }
    echo "</table>";
  }
}

?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>テキスト解析デモ - キーフレーズ抽出</title>
</head>
<body>
<style>
</style>
<h2 class="title">テキスト解析デモ - キーフレーズ抽出</h2>
  <form method="POST" name="qform">
  <textarea id="sentence" name="sentence" rows="4" cols="70"><?php echo escapestring($sentence) ?></textarea>
  <br>
  <input type="submit" name="command_query" value="解析">
  </form>
<?php
  if($sentence){
    show_keyphrase($appid, $sentence);
  }
?>

<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" title="Webサービス by Yahoo! JAPAN" alt="Webサービス by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->
</body>
</html>
