<?php
	use LeanCloud\LeanObject;
	use LeanCloud\LeanQuery;
    use LeanCloud\GeoPoint;
	use LeanCloud\LeanClient;
	use LeanCloud\CloudException;

	require_once("autoload.php");
	require_once('./util.php');

	LeanClient::initialize("tnAvXokcOflTtw7Img2iurs0-gzGzoHsz","xq79UpeXDLtEplPtmxxO7JDG", "605P2gTQ8sDBY1VGTTJ5tlxO");
	$orderid = (int)$_GET['orderid'];

    $query = new LeanQuery("question");
    $query->equalTo("iOrder", $orderid);
    $objects = $query->find();

    forEach($objects as $obj) {
        if ($obj instanceof LeanObject) {
            $obj->destroy();
            echo "dddd";
           // echo $obj->get(QUESTION_TITLE);
        }
    }

?>
