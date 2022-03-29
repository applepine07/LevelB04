<?php
session_start();
$user=$_POST['user'];
unset($_SESSION[$user]);


?>