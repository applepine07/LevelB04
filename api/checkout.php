<?php 
include_once "../base.php";

$_POST['no']=date("Ymd") . rand(100000,999999);
/* while(!empty($Ord->find(['no'=>$_POST['no']]))){
    $_POST['no']=date("Ymd") . rand(100000,999999);

};
 */
// 資料庫不能存陣列，轉成字串才能存到陣列
$_POST['goods']=serialize($_SESSION['cart']);

$Ord->save($_POST);
unset($_SESSION['cart']);

?>

