<?php
// 如果有商品，存到sessoin
if (isset($_GET["id"]) && isset($_GET['qt'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}

// 沒東西就判斷有無登入
if (!isset($_SESSION['mem'])) {
    // 沒登入就導頁，並用exit()停止進行以下程式，很重要
    to("?do=login");
    exit();
}

// 有登入就判斷購物車中有沒有東西，沒東西就呈現「購物車中無商品」
if (empty($_SESSION['cart'])) {
    echo "<h1 class='ct'>購物車中無商品</h1>";
    // 有東西就顯示購物車
} else {
?>
    <h1 class="ct"><?= $_SESSION['mem']; ?>的購物車</h1>
    <table class="all">
        <tr class="tt ct">
            <td>編號</td>
            <td>商品名稱</td>
            <td>數量</td>
            <td>庫存量</td>
            <td>單價</td>
            <td>小計</td>
            <td>刪除</td>
        </tr>
        <?php
        // 用剛才存的商品
        foreach ($_SESSION['cart'] as  $id => $qt) {
            $item = $Goods->find($id);
        ?>
            <tr class="pp ct">
                <td><?= $item['no']; ?></td>
                <td><?= $item['name']; ?></td>
                <td><?= $qt; ?></td>
                <td><?= $item['stock']; ?></td>
                <td><?= $item['price']; ?></td>
                <td><?= $item['price'] * $qt; ?></td>
                <td>
                    <img src="icon/0415.jpg" onclick="delCart(<?= $id; ?>)">
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <img src="icon/0411.jpg" onclick="location.href='index.php'">&nbsp;&nbsp;
        <img src="icon/0412.jpg" onclick="location.href='?do=checkout'">
    </div>
<?php
}
?>

<script>
function delCart(id) {
    // 送id過去
    $.post("api/del_cart.php", {id}, () => {
        // 再回來購物車頁面
        location.href = '?do=buycart';
    })
}
</script>