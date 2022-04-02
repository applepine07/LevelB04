<?php
// 這裡沒有引入base.php所以要寫session_start();
session_start();
$user=$_POST['user'];
unset($_SESSION[$user]);
?>