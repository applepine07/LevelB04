<?php 
include_once "../base.php";

$_POST['no']=date("Ymd") . rand(100000,999999);
/* while(!empty($Ord->find(['no'=>$_POST['no']]))){
    $_POST['no']=date("Ymd") . rand(100000,999999);

};
 */

$_POST['goods']=serialize($_SESSION['cart']);

$Ord->save($_POST);
unset($_SESSION['cart']);

?>

