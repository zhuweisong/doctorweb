<?php

use LeanCloud\LeanObject;
use LeanCloud\LeanQuery;
use LeanCloud\GeoPoint;
use LeanCloud\LeanClient;
use LeanCloud\CloudException;

    require_once("autoload.php");
    require_once('./util.php');

	LeanClient::initialize("tnAvXokcOflTtw7Img2iurs0-gzGzoHsz",	"xq79UpeXDLtEplPtmxxO7JDG", "605P2gTQ8sDBY1VGTTJ5tlxO");
    $query = new LeanQuery("chapter");
    $cnt   = $query->count();
?>

<html>
    <head>
        <title>chapter new add</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<link href="./login/loginmodule.css" rel="stylesheet" type="text/css" />
    </head>
        <body>
    <a href="index.php">Question</a> |
	<a href="chapter.php">Chapter</a>

		<form name="myForm" method="post" action="chapter-new-exec.php">
		<br><br><br>
		    Order:<input  name='iOrder' value="<?php echo $cnt+1 ?>"/><br><br>
			Title:<input name='title'/><br><br>
            <input type="submit" name="Submit" value="submit">
		</form>
 </body>
 </html>
