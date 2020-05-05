<?php
$pngname2 = $_POST["signedFileName"];
if (is_uploaded_file($_FILES["signedPic"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["signedPic"]["tmp_name"], "signedpic/$pngname2")) {
    echo "アップロードしました。<br />";
	  echo $_FILES["signedPic"]["tmp_name"];
  } else {
    echo "アップロード失敗";
  }
} else {
  echo "それは画像ファイルではありません";
}

$currenturl =  (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$picurl = str_replace(basename(__FILE__), "signedpic/$pngname2" , $currenturl);


$file = 'output.html';
// ファイルをオープンして既存のコンテンツを取得します
$current = file_get_contents($file);
// 新しい人物をファイルに追加します
$current = "<!DOCTYPE html>\n <html lang=\"en\">\n <head>\n     <meta charset=\"UTF-8\">\n <meta http-equiv=\"Refresh\" content=\"60\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n  <style type=\"text/css\"> canvas { border: 9px solid #ffffff;} </style>\n <br>\n   <title>output</title>\n </head>\n <script type=\"text/javascript\" src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js\"></script>\n <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js\"></script> \n <body>\n  <img src=\"signedpic/$pngname2\" width=\"200\" height=\"200\">\n <div id=\"img-qr\"></div> \n <br>\n <input type=\"button\" value=\"更新する\" onclick=\"window.location.reload();\" />\n <script>\n  \$(function () {\n     var qrtext = \"$picurl\";\n     var utf8qrtext = unescape(encodeURIComponent(qrtext));\n     \$(\"#img-qr\").html(\"\");\n     \$(\"#img-qr\").qrcode({\n       text: utf8qrtext\n     });\n   });\n </script>\n </body>\n </html>\n";
// 結果をファイルに書き出します
file_put_contents($file, $current);

?>