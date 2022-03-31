<?php include_once "../base.php";
// 有parent嗎?沒有就是0，也就是大分類
$parent=$_POST['parent']??0;
$opts=$Type->all(['parent'=>$parent]);
foreach($opts as $opt){
    echo "<option value='{$opt['id']}'>{$opt['name']}</option>";
}