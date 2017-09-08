<?php 

    header("content-type:application/json;charset=utf-8");
    require_once('db.php');

    if ($link) {
        # 插入新闻

        $newstitle = $_POST['newstitle'];
        $newstype = $_POST['newstype'];
        $newsimg = $_POST['newsimg'];
        $newssrc = $_POST['newssrc'];
        $newstime = $_POST['newstime'];

        $sql = "INSERT INTO `news`(`newstype`, `newstitle`, `newsimg`, `newstime`, `newssrc`) VALUES ('{$newstype}','{$newstitle}','{$newsimg}','{$newstime}','{$newssrc}')";
        mysqli_query($link,'set names utf8');
        $result = mysqli_query($link,$sql);
        echo json_encode(array('success'=>'ok'));
    }




 ?>