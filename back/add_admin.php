<h1 class="ct">新增管理帳號</h1>
<form action="api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1">商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" value="2">訂單管理</div>
                <div><input type="checkbox" name="pr[]" value="3">會員管理</div>
                <div><input type="checkbox" name="pr[]" value="4">頁尾版權區管理</div>
                <div><input type="checkbox" name="pr[]" value="5">最新消息管理</div>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">新增</button> | 
        <button type="reset">重置</button>
    </div>
</form>
<script>
/* function reset(){
    $("#acc,#pw").val("")
    $("input[type='checkbox']").prop('checked',false)
}

function addAdmin(){
    let pr=new Array();
    $("input[type='checkbox']:checked").each((idx,dom)=>{
        pr.push($(dom).val())
    })

$.post("api/save_admin.php",
        {acc:$("#acc").val(),
         pw:$("#pw").val(),
         pr},
        ()=>{
           location.href="?do=admin" 
        })
} */

</script>