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

	$orderid = $_GET['orderid'];
    echo $orderid;
     
    $query = new LeanQuery("question");
    $query->equalTo("iOrder", (int)$orderid);
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
 
		<form name="myForm" method="post" action="question-exec.php">
		<br><br><br>
         <?php
              forEach($objects as $obj) {
                   if ($obj instanceof LeanObject) {
                      $title = $obj->get("title");
         ?>
				Order:<input value="<?php echo $obj->get("iOrder") ?>" name='iOrder'/><br><br>
				Chapter:<input value="<?php echo $obj->get(QUESTION_CHAPTER) ?>" name='iChapter'/><br><br>
				Title:<textarea rows="4" cols="100" name='title'><?php echo $obj->get("title") ?> </textarea><br><br>
				Option:<textarea rows="4" cols="100" name='option'><?php echo $obj->get("option") ?></textarea><br><br>
				Answer:<textarea rows="4" cols="100" name='sAnswer'><?php echo $obj->get("sAnswer") ?></textarea><br><br>
        Single£º<input type="radio" checked="checked" name="singlechoice" value="0" /> 
        MultiChoice£º<input type="radio" name="singlechoice" value="1" /><br><br>
        <input type="submit" name="Submit" value="submit"> 
          <?php
               }
            }
        ?>
		</form>
 </body>
 </html>
