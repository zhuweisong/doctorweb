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
	$iChapterId = (int)$_GET['cid'];

    $query = new LeanQuery("question");
    $query->equalTo(QUESTION_QID, $qid);
    $objects = $query->find();

    forEach($objects as $obj) {
        if ($obj instanceof LeanObject) {
            $obj->destroy();
            echo "delete succeed: ".$qid;
           // echo $obj->get(QUESTION_TITLE);
        }
    }

    $query = new LeanQuery("chapter");
    $query->equalTo(CHAPTER_QID, $iChapterId);
    $chapters = $query->find();

    forEach($chapters as $chpater) {
       if ($chpater instanceof LeanObject) {
            $count = $chpater->get(CHAPTER_QUESTION_COUNT);
            $chpater->set(CHAPTER_QUESTION_COUNT, $count - 1);
            $chpater->save();
            echo "chapter delete-1  :".$iChapterId;
        }
    }

?>
