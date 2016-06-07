<?php

use LeanCloud\LeanObject;
use LeanCloud\LeanQuery;
use LeanCloud\GeoPoint;
use LeanCloud\LeanClient;
use LeanCloud\CloudException;

    require_once("autoload.php");
    require_once('./util.php');

	LeanClient::initialize("tnAvXokcOflTtw7Img2iurs0-gzGzoHsz",	"xq79UpeXDLtEplPtmxxO7JDG", "605P2gTQ8sDBY1VGTTJ5tlxO");
    $query = new LeanQuery("question");
    $cnt   = $query->count();

    $query = new LeanQuery("chapter");
    $query->ascend(CHAPTER_ORDER);
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

		<form name="myForm" method="post" action="question-new-exec.php">
		<br><br><br>
				Order:<input name='iOrder' value="<?php echo $cnt+1 ?>"/><br><br>
				Attr:<select name="singlechoice" >
                    <option value ="0">single-choice</option>
                    <option value ="1">multi-choice</option>
                </select><br><br>
				Chapter:<select name="iChapter" >
				    <?php
                        forEach($objects as $obj) {
                            if ($obj instanceof LeanObject) {
                    ?>
                    <option value ="<?php $obj->get(CHAPTER_ORDER) ?>"><?php echo $obj->get(CHAPTER_DESC) ?></option>
                 <?php
                           }
                        }
                     ?>
                </select><br><br><br><br>
				Title:<textarea rows="4" cols="100" name='title'> </textarea><br><br>
				Option:<textarea rows="4" cols="100" name='option'></textarea><br><br>
				Answer:<textarea rows="4" cols="100" name='sAnswer'></textarea><br><br>

        <input type="submit" name="Submit" value="submit">

		</form>
 </body>
 </html>
