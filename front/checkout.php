<h1 class="ct">填寫資料</h1>
<?php
$mem=$Mem->find(['acc'=>$_SESSION['mem']]);

?>
<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp"><?=$mem['acc'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?=$mem['name'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email" value="<?=$mem['email'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?=$mem['addr'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?=$mem['tel'];?>"></td>
    </tr>
</table>
//加總購物車中的商品價格
<div class="all tt ct">
    總價:<?=$total;?>
</div>
<div class="ct">
    <button onclick="checkout()">確定送出</button>
    <button onclick="location.href='?do=buycart'">返回修改訂單</button>
</div>

<script>
function checkout(){
    let data={
        acc:'<?=$mem['acc'];?>',
        name:$("#name").val(),
        addr:$("#addr").val(),
        email:$("#email").val(),
        tel:$("#tel").val(),
        total:<?=$total;?>
    }

    $.post("api/checkout.php",data,()=>{
        alert("訂購成功\n感謝你的選購")
        location.href='index.php';
    })
}
</script>