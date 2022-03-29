<?php include_once "../base.php";

$parent=$_POST['parent']??0;
$opts=$Type->all(['parent'=>$parent]);
foreach($opts as $opt){
    echo "<option value='{$opt['id']}'>{$opt['name']}</option>";
}