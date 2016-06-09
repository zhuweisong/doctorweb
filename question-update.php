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

	$qid = (int)$_GET['qid'];


    $query = new LeanQuery("question");
    $query->equalTo(QUESTION_QID, $qid);
    echo "qid:".$qid;
    $objects = $query->find();

    $query = new LeanQuery("chapter");
    $query->ascend(CHAPTER_ORDER);
    $chapters = $query->find();
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

		<form name="myForm" method="post" action="question-update-exec.php">
		<br><br><br>
         <?php
              forEach($objects as $obj) {
                   if ($obj instanceof LeanObject) {
                      $chapterid = $obj->get(QUESTION_CHAPTER);
                      $attr = $obj->get(QUESTION_ATTR);
         ?>
                <input type="hidden" value="<?php echo $obj->get(QUESTION_QID) ?>" name='qid'/>
				Order:<input value="<?php echo $obj->get(QUESTION_ORDER) ?>" name='iOrder'/><br><br>
				Title:<textarea rows="4" cols="100" name='title'><?php echo $obj->get("title") ?> </textarea><br><br>
				Option:<textarea rows="4" cols="100" name='option'><?php echo $obj->get("option") ?></textarea><br><br>
				Answer:<textarea rows="4" cols="100" name='sAnswer'><?php echo $obj->get("sAnswer") ?></textarea><br><br>

				Attr:<select name="singlechoice" >
                    <option value ="0" <?php if ($attr==0) echo "selected ='selected'"; ?>>single-choice</option>
                    <option value ="1" <?php if ($attr==1) echo "selected ='selected'"; ?>>multi-choice</option>
                </select><br><br>

				Chapter:<select name="iChapter" >
				    <?php
                        forEach($chapters as $chapter) {
                            if ($chapter instanceof LeanObject) {
                                $currid = (int)$chapter->get(CHAPTER_ORDER)
                    ?>
                    <option value ="<?php echo $currid ?>" <?php if ($chapterid==$currid) echo "selected ='selected'"; ?>><?php echo $chapter->get(CHAPTER_ORDER)."-".$chapter->get(CHAPTER_DESC) ?></option>
                 <?php
                       $i = $i+1;
                           }
                        }
                     ?><br><br>
        <br><br><input type="submit" name="Submit" value="submit">
          <?php
               }
            }
        ?>
		</form>
 </body>
 </html>
