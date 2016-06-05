<?php
	use LeanCloud\LeanObject;
	use LeanCloud\LeanQuery;
    use LeanCloud\GeoPoint;
	use LeanCloud\LeanClient;
	use LeanCloud\CloudException;

	require_once("autoload.php");
	require_once('./util.php');

	LeanClient::initialize("tnAvXokcOflTtw7Img2iurs0-gzGzoHsz","xq79UpeXDLtEplPtmxxO7JDG", "605P2gTQ8sDBY1VGTTJ5tlxO");
	$id = (int)$_POST['id'];
	$iOrder = (int)$_POST['iOrder'];
	$title = $_POST['title'];

    $query = new LeanQuery("chapter");
    $query->equalTo(CHAPTER_QID, $id);
    $objects = $query->find();

    forEach($objects as $obj) {
        if ($obj instanceof LeanObject) {
          	$obj->set(CHAPTER_DESC, $title);//
          	$obj->set(CHAPTER_ORDER, $iOrder);
          	$obj->save();

          	echo $iOrder." update success " ;
        }
    }

?>
