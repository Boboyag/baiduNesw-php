<?php 

    header("content-type:application/json;charset=utf-8");

    require_once('db.php');

// 检测连接
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    // echo "Connected successfully";

    if ($link) {
        //执行成功的过程
        
        $sql = 'SELECT * FROM news order by id desc';
        mysqli_query($link,'set names utf8');
        $result = mysqli_query($link,$sql);
        $senddata = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($senddata,array( 'id'=>$row['id'],
                                        'newstype'=>$row['newstype'],
                                        'newstitle'=>$row['newstitle'],
                                        'newsimg'=>$row['newsimg'],
                                        'newssrc'=>$row['newssrc'],
                                        'newstime'=>$row['newstime']
                        ));
        }
        echo json_encode($senddata,JSON_UNESCAPED_UNICODE);
        

    }else{
        echo json_encode(array('success'=>'none'));
    }


    // $arr = array('newstitle'=>'新闻标题','newsimg'=>'images/3.jpg','newstime'=>'2017-3-17','newssrc'=>'极客科技');
    
    mysqli_close($link);
    // echo json_encode($arr);
?>