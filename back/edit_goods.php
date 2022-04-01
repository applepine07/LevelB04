<?php
// 連結會傳商品id，以下都是該商品在good資料表的資料喔
$g=$Goods->find($_GET['id']);
?>


<h1 class="ct">修改商品</h1>
<form action="api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp"><?=$g['no'];?></td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp">
            <input type="text" name="name" value="<?=$g['name'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp">
            <input type="text" name="price" value="<?=$g['price'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp">
            <input type="text" name="spec" value="<?=$g['spec'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp">
            <input type="text" name="stock" value="<?=$g['stock'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp">
            <input type="file" name="img" id="img">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp">
            <textarea name="intro" id="intro" style="width:90%;height:100px"><?=$g['intro'];?></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$g['id'];?>">
        <button type="submit">修改</button> | 
        <button type="reset">重置</button> | 
        <button type="button" onclick="location.href='?do=th'">返回</button>
    </div>
</form>
<script>
    // 頁面載入時
$("#big").load('api/get_type.php',()=>{

    //大分類的選項們載入完成時,用該商品的big(商品資料表有big欄位)和prop去選定商品的大分類
    $("#big option[value='<?=$g['big'];?>']").prop('selected',true);
// 大分類的選項載入完成後，依該商品的big欄位去撈parent是big，也就是撈該大分類的中分類們
    $("#mid").load('api/get_type.php',{parent:$("#big").val()},()=>{
        //中分類的選項們載入完成時,用mid及prop去選定商品的中分類
        $("#mid option[value='<?=$g['mid'];?>']").prop('selected',true);
    })
})

$("#big").on("change",function(){
    $("#mid").load("api/get_type.php",{parent:$("#big").val()})
})
</script>