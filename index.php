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

    $query = new LeanQuery("question");
    $cnt   = $query->count();
    $query->ascend(QUESTION_ORDER);
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

    <form name="myForm" method="post" action="index.php">
    <table  border="1" cellspacing="0" cellpadding="0">
        <caption>Question<?php echo $cnt?>
		<th>index</th>
		<th>title</th>
		<th>chapter</th>
		<th>updatedAt</th>
		<th>update</th>
  		<th>delete</th>

         <?php
              forEach($objects as $obj) {
                   if ($obj instanceof LeanObject) {
                      $title = $obj->get("title");
         ?>
         <tr align="center">
				<td><?php echo $obj->get("iOrder") ?></td>
				<td><?php echo $obj->get("title") ?></td>
				<td><?php echo $obj->get("iChapter") ?></td>
				<td><?php echo $obj->get("updatedAt")->format('Y-m-d H:i:s') ?></td>
				<td>&nbsp;&nbsp;<a href="updatequestion.php?orderid=<?php  echo $obj->get("iOrder") ?>" target="_blank">update</a>&nbsp;&nbsp;</td>
    			<td>&nbsp;&nbsp;<a href="question-delete.php?orderid=<?php  echo $obj->get("iOrder") ?>" target="_blank">delete</a>&nbsp;&nbsp;</td>
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
