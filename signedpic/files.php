<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?PHP
$dirpath = "./";	//表示対象のディレクトリパス
$dirlist = dir($dirpath);
while( $filename = $dirlist->read() ){
	//ディレクトリの場合は表示対象外（＝ファイルのみ表示）
	if( (is_dir($filename) == false) && ($filename!=".." || $filename!= "." ) ){
		print("<a href=\"" . $dirpath . $filename . "\"><img src=\"" . $dirpath . $filename . "\"><br />".$filename."</a><br /><hr>\n");
	}
}
$dirlist->close();
?>
<p><a href="https://pg.kdtk.net/343" target="_blank">こちらのページのスクリプト</a>をつかわせていただいています</p>
</body>
</html>
