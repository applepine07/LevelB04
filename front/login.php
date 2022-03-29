<h1>第一次購物</h1>
<a href="?do=reg"><img src="icon/0413.jpg" alt=""></a>
<h1>會員登入</h1>

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
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <?php
                $a=rand(10,99);
                $b=rand(10,99);
                // 存入真正的驗證碼答案到session
                $_SESSION['ans']=$a+$b;
                echo $a . " + " . $b . " = ";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct"><button onclick="login()">確認</button></div>

<script>
function login(){
    // ↓↓↓傳輸入的驗證碼答案到api
    $.post("api/chk_ans.php",{ans:$("#ans").val()},(chk)=>{
        // ↓↓↓如果驗證碼對(chk等於1)才進行以下的動作
        if(parseInt(chk)){
            $.post("api/chk_pw.php",
                   {table:'member',acc:$("#acc").val(),pw:$("#pw").val()},
                   (res)=>{
                        if(parseInt(res)){
                            location.href="index.php";
                        }else{
                            alert("帳號或密碼錯誤")
                        }
                    })
        }else{
            alert("對不起，您輸入的驗證碼有誤請您重新登入")
        }
    })
}


</script>