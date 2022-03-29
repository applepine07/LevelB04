`<h1 class="ct">訂單管理</h1>
<table class="all ct">
    <tr class="tt">
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <?php
    $rows=$Ord->all();
    foreach($rows as $row){
    ?>
    <tr class="pp">
        <td><a href='?do=detail&id=<?=$row['id'];?>'><?=$row['no'];?></a></td>
        <td><?=$row['total'];?></td>
        <td><?=$row['acc'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=date("Y/m/d",strtotime($row['orddate']));?></td>
        <td>  
            <button onclick="del('ord',<?=$row['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
