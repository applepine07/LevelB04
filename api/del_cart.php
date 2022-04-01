<?php
session_start();
// 刪掉我們存的session裡那個傳過來的id的值就好
unset($_SESSION['cart'][$_POST['id']]);
?>