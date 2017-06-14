<?php
	session_start();
	$captcha=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"),0,6);

	$_SESSION['captcha']=$captcha;

	$gambar=imagecreate(60, 20);
	$wk=imagecolorallocate($gambar, 255, 222, 173);

	$wt=imagecolorallocate($gambar, 255, 255, 255);

	imagefilledrectangle($gambar, 0, 0, 50, 20, $wk);
	imagestring($gambar, 10, 3, 3, $captcha, $wt);
	imagejpeg($gambar);
?>