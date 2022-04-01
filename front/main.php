<?php
// 以下主要依傳來的type(type表裡的id)去決定❶$nav(標題)、❷$rows(商品們)
// 有type嗎?有就是type值，沒有type就為0
$type=$_GET['type']??0;
// type為0就撈全部商品是上架的，這邊分二種情況
// 是全部商品(type為0)，或是else(按的是大分類或中分類)
if($type==0){
    $nav="全部商品";
    // ↓是撈goods資料表裡全部上架的商品
    $rows=$Goods->all(['sh'=>1]);
// ↓↓↓type不為0就在type表撈該id
}else{
    // 依id去撈，再看撈出來的parent是0或別的，0就是代表$type是大分類的id
    $t=$Type->find($type);
    // ↓↓↓parent為0是大分類
    if($t['parent']==0){
        // 標題就是它的name欄位，存到$nav(type表裡大分類的name欄位)
        $nav=$t['name'];
        // 就在good表撈該大分類的所有上架商品
        $rows=$Goods->all(['sh'=>1,'big'=>$type]);
    // ↓↓↓若t的parent不為0，表$type它是中分類的id，依它的parent(也就是type表裡大分類id)的撈出type表中該大分類存到$b變數
    }else{
        $b=$Type->find($t['parent']);
        // ↓↓↓大分類名 > 中分類名
        $nav= $b['name'] ." > ".$t['name'];
        // 就到goods撈該中分類的所有上架商品，下方的$type是中分類的id
        $rows=$Goods->all(['sh'=>1,'mid'=>$type]);
    }
}
?>

<h1><?=$nav;?></h1>

<?php
// 這個$rows在上面有辨別是大分類或中分類的商品了
foreach($rows as $row){
?>
<div class="all" style="display:flex;justify-content:center;height:170px">
    <div class="pp ct" style="padding:20px;width:40%">
    <!-- 按照片會到detail，要到商品id過去 -->
        <a href='?do=detail&id=<?=$row['id'];?>'><img src="img/<?=$row['img'];?>" style="width:100%;height:100%"></a>
    </div>
    <div style="width:60%" class="pp">
        <div class="tt ct"><?=$row['name'];?></div>
        <div>
            價錢:<?=$row['price'];?>
            <!-- ↓↓↓將商品的id和數量qt帶去buycard -->
            <a href='?do=buycart&id=<?=$row['id'];?>&qt=1' style="float:right"><img src="icon/0402.jpg" alt=""></a>
        </div>
        <div>規格:<?=$row['spec'];?></div>
        <div>簡介:<?=mb_substr($row['intro'],0,20);?>...</div>
    </div>
</div>


<?php
}


?>