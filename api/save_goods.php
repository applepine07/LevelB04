<?php include_once "../base.php";

// 有傳圖嗎?有的話就存
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

// add、edit、show都用這支api
// 判斷有沒有id，沒有的話就是新增
if(!isset($_POST['id'])){
    $_POST['no']=rand(100000,999999);
}

$Goods->save($_POST);

to("../back.php?do=th");