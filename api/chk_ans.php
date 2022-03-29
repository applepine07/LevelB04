<?php
session_start();

if($_POST['ans']==$_SESSION['ans']){
    echo 1;
}else{
    echo 0;
}







//echo $_POST['ans']==$_SESSION['ans'];