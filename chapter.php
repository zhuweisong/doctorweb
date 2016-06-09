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

    $query = new LeanQuery("chapter");
    $cnt   = $query->count();
    $query->ascend(CHAPTER_ORDER);
    $objects = $query->find();
?>

<html>
    <head>
        <title>Question</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    </head>
        <body>
    <a href="question.php">Question</a> |
	<a href="chapter.php">Chapter</a>

    <form name="myForm" method="post" action="chapter.php">
    <br/><br/><a href="chapter-newadd.php?orderid=-1 ?>" target="_blank">new add</a><br/><br/>

    <table  border="1" cellspacing="0" cellpadding="0">
        <caption>chapter<?php echo $cnt?>
		<th>iOrder</th>
		<th>desc</th>
		<th>question count</th>
		<th>updatedAt</th>
		<th>update</th>
  		<th>delete</th>

         <?php
              forEach($objects as $obj) {
                   if ($obj instanceof LeanObject) {
         ?>
         <tr align="center">
				<td><?php echo $obj->get(CHAPTER_ORDER) ?></td>
				<td><?php echo $obj->get(CHAPTER_DESC) ?></td>
				<td><?php echo $obj->get(CHAPTER_QUESTION_COUNT) ?></td>
				<td><?php echo $obj->get("updatedAt")->format('Y-m-d H:i:s') ?></td>
				<td>&nbsp;&nbsp;<a href="chapter-update.php?id=<?php  echo $obj->get(CHAPTER_QID) ?>" target="_blank">update</a>&nbsp;&nbsp;</td>
    			<td>&nbsp;&nbsp;<a href="chapter-delete.php?id=<?php  echo $obj->get(CHAPTER_QID) ?>" target="_blank">delete</a>&nbsp;&nbsp;</td>
			</tr>
           <?php
               }
            }
         ?>
         </table>
			Total:<font color='red'><?php echo $cnt ?></font>
		</form>
 </body>
 </html>
