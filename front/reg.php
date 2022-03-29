<h1 class="ct">會員註冊</h1>
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
            <button onclick="chkAcc()">檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">註冊</button>
    <button onclick="reset()">重置</button>
</div>

<script>
function chkAcc(){
    let acc=$("#acc").val()
    $.post("api/chk_acc.php",{acc},(chk)=>{
        if(parseInt(chk) || acc=='admin'){
            alert("帳號已存在")
        }else{
            alert("此帳號可使用")
        }
    })
}

function reg(){
    let data={
        acc:$("#acc").val(),
        name:$("#name").val(),
        pw:$("#pw").val(),
        addr:$("#addr").val(),
        tel:$("#tel").val(),
        email:$("#email").val(),
    }
    $.post("api/chk_acc.php",{acc:data.acc},(chk)=>{
        if(parseInt(chk) || data.acc=='admin'){
            alert("帳號已存在")
        }else{
            $.post("api/reg.php",data,()=>{
                alert("註冊完成，歡迎加入")
                location.href='?do=login'
            })
        }
    })
}


</script>