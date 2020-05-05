<?php
$pngname = $_POST["timebasedname"];
if (is_uploaded_file($_FILES["clipboardImage"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["clipboardImage"]["tmp_name"], "temppic/$pngname")) {
    echo "アップロードしました。<br />";
	  echo $_FILES["clipboardImage"]["tmp_name"];
  } else {
    echo "アップロード失敗";
  }
} else {
  echo "それは画像ファイルではありません";
}
?>