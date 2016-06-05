<?php
	use LeanCloud\LeanObject;
	use LeanCloud\LeanQuery;
    use LeanCloud\GeoPoint;
	use LeanCloud\LeanClient;
	use LeanCloud\CloudException;

	require_once("autoload.php");
	require_once('./util.php');

	LeanClient::initialize("tnAvXokcOflTtw7Img2iurs0-gzGzoHsz",	"xq79UpeXDLtEplPtmxxO7JDG", "605P2gTQ8sDBY1VGTTJ5tlxO");


	$iOrder = (int)$_POST['iOrder'];
	$title = $_POST['title'];

    $obj = new LeanObject("chapter");
    $obj->set(CHAPTER_DESC, $title);
    $obj->set(CHAPTER_LEVEL, 1);
  	$obj->set(QUESTION_ORDER, $iOrder);
  	$obj->save();
  	echo "succeed";

?>
