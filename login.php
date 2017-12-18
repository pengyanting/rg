<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
     <link rel="stylesheet" type="text/css" href="css/xcConfirm.css"/>
</head>

<body>
    <div class='title'>软件类课程智能云课堂</div>
    <div class="login">
        <form name="login_form" id="login_form">
            <div class="item">
               <label for="">用户登录</label>
            </div>
            <div class="item">
                <input type="text" name="username" id="username" placeholder="用户名" class="text" autocomplete="false">
            </div>
            <div class="item">
                <input type="password" name="password" id="password" placeholder="密码" class="text" autocomplete="false">
            </div>
            <div class="item">
                <input type="button" value="登录" class="btn login_btn" id="login_btn">
            </div>
            <div class="item">
                <a href="relogin.php">还没有账号？马上去注册！</a>
            </div>
        </form>
    </div>
</body>
<script src='js/jquery.js'></script>
<script src="js/xcConfirm.js" type="text/javascript" charset="utf-8"></script>
<script src='js/common.js'></script>
<script>
    $(function () {
        $(".login_btn").click(function () {
            var userName = $("#username").val();
            var password = $("#password").val();
            if (userName == "") {
                alert("用户名不能为空！",'warning');
                return;
            }
            if (password == "") {
                alert("密码不能为空",'warning');
                return;
            }
            $.ajax({
                type: 'POST',
                url: "php/login.php",
                dataType: "json",
                data: {
                    userName: userName,
                    password: password
                },
                success: function (data) {
                    if (data.length>0) {
                        localStorage.setItem("username", data[0].username);
                        localStorage.setItem("id", data[0].id);
                        alert("登录成功！",'success',function(){
                            window.location = 'index.php';
                        })
                    }else{
                        alert("请检查用户名或密码是否正确！",'error')
                    }
                }
            });
        })

    })
</script>

</html>