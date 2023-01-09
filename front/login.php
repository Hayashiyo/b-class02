<fieldset class="ct">
    <legend>會員登入</legend>
    <table>
        <tr>
            <td>acc</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>pw</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <button onclick="login()">login</button>
                <button onclick="cl()">delete</button>
            </td>
            <td>
                <a href="do=forgot">忘記密碼</a>
                <a href="do=reg">註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function cl() {
        $("#acc,#pw").val('')

    }

    function login() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val()
        }
        $.post("./api/chk_acc.php", user, (result) => {
            if (parseInt(result) === 1) {
                $.post("./api/chk_pw.php", user, (result) => {
                    console.log(result);
                    if (parseInt(result) === 1) {
                        if (user.acc === 'admin') {
                            // location.href = 'back.php';
                        } else {
                            location.href = 'index.php';
                        }
                    } else {
                        alert("wrong pw");

                    }
                });
            } else {
                alert("no acc");
            }
        })
    }
</script>