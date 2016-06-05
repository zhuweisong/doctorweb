<?php

use LeanCloud\LeanObject;
use LeanCloud\LeanQuery;
use LeanCloud\GeoPoint;
use LeanCloud\LeanClient;
use LeanCloud\CloudException;

    require_once("autoload.php");
    require_once('./util.php');

	LeanClient::initialize("tnAvXokcOflTtw7Img2iurs0-gzGzoHsz",
		"xq79UpeXDLtEplPtmxxO7JDG", "605P2gTQ8sDBY1VGTTJ5tlxO");

	$cid = (int)$_GET['id'];
    echo $cid;

    $query = new LeanQuery("chapter");
    $query->equalTo(CHAPTER_QID, $cid);
    $objects = $query->find();
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

		<form name="myForm" method="post" action="chapter-update-exec.php">
		<br><br><br>
         <?php
              forEach($objects as $obj) {
                   if ($obj instanceof LeanObject) {
                      $title = $obj->get("title");
         ?>
                <input type="hidden" value="<?php echo $obj->get(CHAPTER_QID) ?>" name='id'/>
				Order:<input value="<?php echo $obj->get(CHAPTER_ORDER) ?>" name='iOrder'/><br><br>
				Title:<textarea rows="4" cols="100" name='title'><?php echo $obj->get(CHAPTER_DESC) ?> </textarea><br><br>
				<br><br>
        <input type="submit" name="Submit" value="submit">
          <?php
               }
            }
        ?>
		</form>
 </body>
 </html>
