<?php
    header("content-type:application/json;charset=utf-8");
    require_once('db.php');
    if ($link) {
        $newsid = $_POST['newsid'];

        mysqli_query($link,'set names utf8');
        $sql = "DELETE FROM `news` WHERE `news`.`id` = {$newsid}";
        
        mysqli_query($link,$sql);

        echo json_encode(array('删除状态'=>'成功'),JSON_UNESCAPED_UNICODE);
    }


    mysqli_close($link);
?>