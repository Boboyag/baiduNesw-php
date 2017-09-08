<?php
    header("content-type:application/json;charset=utf-8");
    require_once('db.php');
    if ($link) {
        $newsid = $_GET['newsid'];

        mysqli_query($link,'set names utf8');
        $sql = "SELECT * FROM `news` WHERE `id` = {$newsid}";
        
        $result = mysqli_query($link,$sql);

        $senddata = array();

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($senddata,array(
                                    'id'=>$row['id'],
                                    'newstype'=>$row['newstype'],
                                    'newstitle'=>$row['newstitle'],
                                    'newsimg'=>$row['newsimg'],
                                    'newssrc'=>$row['newssrc'],
                                    'newstime'=>$row['newstime']

                ));
        }
        echo json_encode($senddata,JSON_UNESCAPED_UNICODE);
    }


    mysqli_close($link);
?>