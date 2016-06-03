<?php

use LeanCloud\LeanObject;
use LeanCloud\LeanQuery;
use LeanCloud\GeoPoint;
use LeanCloud\LeanClient;
use LeanCloud\CloudException;

    require_once("autoload.php");
    require_once('./util.php');

	LeanClient::initialize("tnAvXokcOflTtw7Img2iurs0-gzGzoHsz",	"xq79UpeXDLtEplPtmxxO7JDG", "605P2gTQ8sDBY1VGTTJ5tlxO");

?>

<html>
    <head>
        <title>Question</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<link href="./login/loginmodule.css" rel="stylesheet" type="text/css" />
    </head>
        <body>
    <a href="index.php">Question</a> |
	<a href="chapter.php">Chapter</a>

		<form name="myForm" method="post" action="question-new-exec.php">
		<br><br><br>

				Order:<input  name='iOrder'/><br><br>
				Chapter:<input name='iChapter'/><br><br>
				Title:<textarea rows="4" cols="100" name='title'> </textarea><br><br>
				Option:<textarea rows="4" cols="100" name='option'></textarea><br><br>
				Answer:<textarea rows="4" cols="100" name='sAnswer'></textarea><br><br>
        Single£º<input type="radio" checked="checked" name="singlechoice" value="0" />
        MultiChoice£º<input type="radio" name="singlechoice" value="1" /><br><br>
        <input type="submit" name="Submit" value="submit">

		</form>
 </body>
 </html>
