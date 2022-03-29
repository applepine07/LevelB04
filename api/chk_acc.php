<?php include_once "../base.php";

$chk=$Mem->math('count','*',['acc'=>$_POST['acc']]);
if($chk){
    echo 1;
}else{
    echo 0;
}




//echo $Mem->math('count','*',['acc'=>$_POST['acc']]);