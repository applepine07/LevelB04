<?php 

$g=$Goods->find($_GET['id']);

echo "<h1 class='ct'>{$g['name']}</h1>";
?>

<div class="all">
    <div class="pp ct">
        <img src="img/<?=$g['img'];?>" style="width:90%;padding:10px">
    </div>
    <div class="pp" style="width:33%">
        <div>分類:</div>
        <div>編號:<?=$g['no'];?></div>
        <div>價格:<?=$g['price'];?></div>
        <div>詳細說明:<?=$g['intro'];?></div>
        <div>庫存量:<?=$g['stock'];?></div>
    </div>
</div>
<div class="tt ct all">
    購買數量：<input type="number" name="qt" id="qt" value="1">
    <img src="icon/0402.jpg" onclick="buy(<?=$g['id'];?>)">
</div>


<script>
function buy(id){
    //location.href="?do=bucart&id"+id+"&qt="+$("#qt").val();
    location.href=`?do=buycart&id=${id}&qt=${$("#qt").val()}`;
}

</script>