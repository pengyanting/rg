<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/xcConfirm.css"/>
    <link rel="stylesheet" href="css/relogin.css">
</head>

<body>
    <div class="zr_top">
        <div class="header  clearfix">
            <div class="logo">
                <a href="">软件类课程智能云课堂</a>
            </div>
            <div class="user_info">
                <a href="login.php" class="login_btn hide">登录</a>
            </div>
        </div>
    </div>
    <div class='w1180'>
        <div class='welcom'>欢迎加入软件类课程智能云课堂！请填写以下信息，进行注册哦！</div>
        <div class='warn'>温馨提示：
            <sapn>*</sapn>为必填项哦！</div>
        <div class="up_info clearfix">
            <div class='item clearfix'>
                <label for="" class='require'>用户名</label>
                <input type="text" value="" placeholder="请输入用户名" name='username' class='left' required>
            </div>
            <div class='item clearfix'>
                <label for="">性别</label>
                <input type="radio" value="男" name="gender">男
                <input type="radio" value="女" name='gender'>女
            </div>
            <div class='item clearfix'>
                <label for="">出生日期</label>
                <input type="type" value="" placeholder="请输入出生日期" name='age'>
            </div>
            <div class='item clearfix'>
                <label for="">住址</label>
                <input type="text" value="" placeholder="请输入家庭住址" name='address'>
            </div>
            <div class='item clearfix'>
                <label for="" class='require'>电话</label>
                <input type="text" value="" placeholder="请输入电话" name='phone' required>
            </div>
            <div class='item clearfix'>
                <label for="">院校</label>
                <input type="text" value="" placeholder="请输入院校名称" name='school'>
            </div>
            <div class='item clearfix'>
                <label for="">专业</label>
                <input type="text" value="" placeholder="请输入专业名称" name='project'>
            </div>
            <div class='item clearfix'>
                <label for="" class='require'>密码</label>
                <input type="password" value="" placeholder="请输入密码" name='password' required>
            </div>
            <div class='item clearfix'>
                <label for="" class='require'>确认密码</label>
                <input type="password" value="" placeholder="再次输入密码" name='pwd' required>
            </div>
            <input type="button" value='立即注册' class='up_info_btn'>
        </div>
    </div>
    <div class="footer">
        <div class="f-links">
            <h1>友情链接</h1>
            <ul class="clearfix">
                <li><a target="black" href="http://www.xztc.edu.cn/">忻州师范学院</a></li>
                <li><a target="black" href="http://jxdw.xztc.edu.cn/computer/jsjx.asp">忻州师范学院计算机系</a></li>
                <li><a target="black" href="http://www.imooc.com/">慕课网</a></li>
                <li><a target="black" href="http://www.miaov.com/">妙味学堂</a></li>
                <li><a target="black" href="http://study.163.com/">网易云课堂</a></li>
                <li><a target="black" href="http://www.36zhen.cn/">36镇</a></li>
                <li><a target="black" href="https://www.zhihu.com/">知乎</a></li>
                <li><a target="black" href="http://class.qq.com/">腾讯精品课</a></li>
                <li><a target="black" href="http://www.jikexueyuan.com/">极客学院</a></li>
                <li><a target="black" href="http://www.yzfjy.com/">云中帆教育</a></li>
            </ul>
            <ul class="clearfix">
                <li><a target="black" href="http://www.sxu.edu.cn/">山西大学</a></li>
                <li><a target="black" href="http://www.tynu.edu.cn/">太原师范学院</a></li>
                <li><a target="black" href="http://www.tianxiawangxiao.com/index.aspx?isInside=0">天下网校</a></li>
                <li><a target="black" href="http://huaban.com">花瓣网</a></li>
                <li><a target="black" href="http://www.zcool.com.cn">站酷</a></li>
                <li><a target="black" href="https://www.qidianla.com/">起点学院</a></li>
                <li><a target="black" href="https://gold.xitu.io/">掘金</a></li>
                <li><a target="black" href="http://www.tuicool.com/">推酷</a></li>
                <li><a target="black" href="http://www.weekedu.com/default.htm">为课网校</a></li>
                <li><a target="black" href="http://www.kgc.cn/">课工厂</a></li>
            </ul>
        </div>
        <p class="cr">Copyright 2017©彭艳婷所有 忻州师范学院计算机系 </p>
    </div>
</body>
<script src='js/jquery.js'></script>
<script src="js/xcConfirm.js" type="text/javascript" charset="utf-8"></script>
<script src='js/common.js'></script>
<script>
    $(function () {
        $(".up_info_btn").click(function () {
            var username = $("input[name=username]").val();
            var gender = $("input[name=gender]:checked").val();
            var age = $("input[name=age]").val();
            var address = $("input[name=address]").val();
            var phone = $("input[name=phone]").val();
            var school = $("input[name=school]").val();
            var project = $("input[name=project]").val();
            var password = $("input[name=password]").val();
            var pwd = $("input[name=pwd]").val();
            if(username==''||password==''||pwd==''||phone==''){
                alert('请输入必填信息！','warning');
                return;
            }
            if (pwd != password) {
                alert('两次输入的密码不一致，请重新输入！','warning');
                return;
            }
            $.ajax({
                type: "POST",
                url: 'php/relogin.php',
                dataType: "json",
                data: {
                    username: username ? username : '',
                    gender: gender ? gender : '',
                    age: age ? age : gender,
                    address: address ? address : '',
                    phone: phone ? phone : '',
                    school: school ? school : '',
                    project: project ? project : '',
                    password: password ? password : ''
                },
                success: function (data) {
                    console.log(data)
                    if (data == 1) {
                      alert('注册成功！赶快去登录试试吧！','success',function(){
                          window.location='login.php';
                      })
                    } else {
                      alert('注册失败，请确认信息无误后再操作','error');
                    }
                }
            })
        })
    })
</script>

</html>