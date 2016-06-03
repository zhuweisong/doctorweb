<?php
	use LeanCloud\LeanObject;
	use LeanCloud\LeanQuery;
    use LeanCloud\GeoPoint;
	use LeanCloud\LeanClient;
	use LeanCloud\CloudException;

	require_once("autoload.php");
	require_once('./util.php');

	LeanClient::initialize("tnAvXokcOflTtw7Img2iurs0-gzGzoHsz","xq79UpeXDLtEplPtmxxO7JDG", "605P2gTQ8sDBY1VGTTJ5tlxO");
	$qid = (int)$_GET['qid'];
    echo $qid;

    $query = new LeanQuery("question");
    $query->equalTo(QUESTION_QID, $qid);
    $objects = $query->find();

    forEach($objects as $obj) {
        if ($obj instanceof LeanObject) {
            $obj->destroy();
            echo "delete succeed: ";
           // echo $obj->get(QUESTION_TITLE);
        }
    }

?>
