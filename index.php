<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
// コンテンツ代入（テスト）
$text = '<img><iframe width="560" height="315" src="https://www.youtube.com/embed/Ue4PCI0NamI" frameborder="0" allowfullscreen></iframe><iframe src="https://player.vimeo.com/video/65018379" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><img src="http://lorempixel.com/output/sports-q-c-640-480-4.jpg" alt="" width="640"><img style="-webkit-user-select: none" src="http://lorempixel.com/output/abstract-q-c-640-480-8.jpg">';

if(stristr($text, 'youtube')) { // Youtube動画を取得
	preg_match('/youtube\.com\/embed\/(\w+)\"/i',$text,$match);
	echo '<img src="http://i.ytimg.com/vi/'.$match[1].'/hqdefault.jpg" />';
}
elseif(stristr($text, 'vimeo')) { // Vimeo動画を取得
	preg_match('/vimeo\.com\/video\/(\w+)\"/',$text,$match);
	$imgid = 6271487;
	$hash = unserialize(file_get_contents('http://vimeo.com/api/v2/video/'.$match[1].'.php'));
	$imgsrc =  $hash[0]['thumbnail_large'];
	echo '<img src="'.$imgsrc.'" />';
}
elseif(stristr($text, '<img')) { // 画像を取得
	preg_match('/(<img[^>]+>)/i' , $text, $match);
	echo $match[1];
}
?>
</body>
</html>