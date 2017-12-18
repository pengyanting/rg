<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>软件类课程智能云课堂</title>
    <link rel="stylesheet" href="css/common.css">
     <link rel="stylesheet" type="text/css" href="css/xcConfirm.css"/>
    <link rel="stylesheet" type="text/css" href="css/user.css" />
</head>
<body>
    <div class="zr_top">
        <div class="header  clearfix">
            <div class="logo">
                <a href="">软件类课程智能云课堂</a>
            </div>
            <div class="user_info">
                <a href="javascript:;" class="user_name"></a>
                <a href="login.php" class="login_btn">登录</a>
                <a href="javascript:;" class="logout_btn">退出</a>
            </div>
        </div>
    </div>
    <div class="nav">
        <div class="w1180">
            <ul>
                <li><a href="index.php">首页</a></li>
                <li><a href="course.php">课程中心</a></li>
                <li><a href="task.php">我的任务</a></li>
                <li><a href="message.php">消息中心</a></li>
                <li class="active"><a href="user.php">个人中心</a></li>
            </ul>
        </div>
    </div>
    <div class="user  clearfix">
        <div class='user_left'>
            <div class='uf_top'>
                <img src="img/noavatar.png" alt="">
                <p></p>
            </div>
            <div class='uf_bottom'>
                <h4>账号设置</h4>
                <ul>
                    <li class='active'>个人信息<span>&gt;</span></li>
                    <li>密码设置<span>&gt;</span></li>
                </ul>
            </div>
        </div>
        <div class='nologin hide'>
            <img src="img/nologin.png" alt="">
            <p>你还没有登陆哦！<a href="login.php">快去登录吧！</a></p>
        </div>
        <div class='user_right'>
            <div class="ur_title">
                <h3>个人信息</h3>
                <span class='update_info'>编辑</span>
            </div>
            <div class="user_info">
                <div class="item">
                    <span>用户名：</span><input id='username' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>性&nbsp;&nbsp;&nbsp;别：</span><input id='gender' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>生&nbsp;&nbsp;&nbsp;日：</span><input id='age' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>地&nbsp;&nbsp;&nbsp;址：</span><input id='address' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>电&nbsp;&nbsp;&nbsp;话：</span><input id='phone' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>专&nbsp;&nbsp;&nbsp;业：</span><input id='project' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>院&nbsp;&nbsp;&nbsp;校：</span><input id='school' type="text" value="" disabled="disabled">
                </div>
            </div>
        </div>
        <div class='user_right hide'>
            <div class="ur_title">
                <h3>密码设置</h3>
            </div>
            <div class='up_pwd'>
                <div class='item'>
                    <label for="">原始密码：</label>
                    <input type="password" value="" placeholder="请输入原始密码" class='oldpassword'>
                </div>
                <div class='item'>
                    <label for="">新&nbsp;密&nbsp;码&nbsp;：</label>
                    <input type="password" value="" placeholder="请输入新密码" class='newpassword'>
                </div>
                <div class='item'>
                    <label for="">确认密码：</label>
                    <input type="password" value="" placeholder="确认新密码" class='confirmpassword'>
                </div>
                <input type="button" value='确认修改' class='up_btn'>
            </div>
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
    <div class='mask hide'></div>
    <div class="up_info hide">
        <h3>设置信息<span>+</span></h3>
        <div class='item'>
            <label for="">用&nbsp;户&nbsp;名&nbsp;：</label>
            <input type="text" value="" placeholder="请输入用户名" name='username'>
        </div>
        <div class='item'>
            <label for="">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别&nbsp;：</label>
            <input type="radio" value="男" name="gender">&nbsp;&nbsp;男&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" value="女" name='gender'>&nbsp;&nbsp;女
        </div>
        <div class='item'>
            <label for="">出生日期：</label>
            <input type="type" value="" placeholder="请输入出生日期" name='age'>
        </div>
        <div class='item'>
            <label for="">住&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址&nbsp;：</label>
            <input type="text" value="" placeholder="请输入家庭住址" name='address'>
        </div>
        <div class='item'>
            <label for="">电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话&nbsp;：</label>
            <input type="text" value="" placeholder="请输入电话" name='phone'>
        </div>
        <div class='item'>
            <label for="">院&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;校&nbsp;：</label>
            <input type="text" value="" placeholder="请输入院校名称" name='school'>
        </div>
        <div class='item'>
            <label for="">专&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业&nbsp;：</label>
            <input type="text" value="" placeholder="请输入专业名称" name='project'>
        </div>
        <input type="button" value='确认修改' class='up_info_btn'>
    </div>
    </div>
</body>
<script src="js/jquery.js"></script>
<script src="js/xcConfirm.js" type="text/javascript" charset="utf-8"></script>
<script src="js/common.js"></script>
<script>
    $(function () {
        if (!localStorage.getItem("username")) {
            $(".nologin").show();
            $(".user_right").eq(0).hide();
            return;
        }
        $(".nologin").hide();
        $(".user_right").eq(0).show();
        $(".uf_top p").html(localStorage.getItem('username'));
        //获取个人信息
        var oldPwd;
        var info;
        function getInfo(fn) {
            $.ajax({
                type: 'GET',
                url: "php/getUserInfo.php",
                dataType: "json",
                data: {
                    id: localStorage.getItem("id")
                },
                success: function (data) {
                    var data = data[0];
                    var str = "";
                    info = data;
                    oldPwd = data['password'];
                    for (var i in data) {
                        if (data[i] == '' || data[i] == undefined) {
                            data[i] = '未设置';
                        }
                        $("#" + i).val(data[i]);
                    }
                    if (fn) {
                        fn();
                    }
                }
            });
        }
        getInfo();
        //修改密码
        $(".up_btn").click(function () {
            var oldpassword = $(".oldpassword").val();
            var newpassword = $(".newpassword").val();
            var confirmpassword = $(".confirmpassword").val();
            if (oldpassword != oldPwd) {
                alert("原始密码有误",'warning');
                return;
            }
            if (newpassword != confirmpassword) {
                alert("两次输入的密码不一致",'warning');
                return;
            }
            $.ajax({
                type: "POST",
                url: 'php/upPwd.php',
                dataType: "json",
                data: {
                    id: localStorage.getItem("id"),
                    password: newpassword
                },
                success: function (data) {
                    if (data == 1) {
                        alert("修改成功！为确保账户安全请重新登录。",'success',function(){
                            window.location = 'login.php';
                        });
                        localStorage.setItem("username", "");
                        localStorage.setItem("id", "");
                        $(".oldpassword").val('');
                        $(".newpassword").val('');
                        $(".confirmpassword").val('');
                    } else {
                        alert('修改失败','error')
                    }
                }
            })
        })
        //tab切换
        $(".uf_bottom li").click(function () {
            var index = $(this).index(".uf_bottom li");
            $(".user_right").hide().eq(index).show();
            $(this).addClass('active').siblings().removeClass("active");
        })
        //修改信息
        $(".update_info").click(function () {
            for (var i in info) {
                if (info[i] == '未设置' || info[i] == undefined) {
                    info[i] = '';
                }
                if (i == 'gender') {
                    if (info[i] == '男') {
                        $("input[name=" + i + "]").eq(0).attr('checked', true);
                        $("input[name=" + i + "]").eq(1).removeAttr('checked');
                    } else {
                        $("input[name=" + i + "]").eq(0).removeAttr('checked');
                        $("input[name=" + i + "]").eq(1).attr('checked', true);
                    }
                } else {
                    $("input[name=" + i + "]").val(info[i]);
                }
            }
            maskShow();
            $(".up_info").show();
        })
        $(".up_info span").click(function () {
            maskHide();
            $(".up_info").hide();
        })
        $(".up_info_btn").click(function () {
            var username = $("input[name=username]").val();
            var gender = $("input[name=gender]:checked").val();
            var age = $("input[name=age]").val();
            var address = $("input[name=address]").val();
            var phone = $("input[name=phone]").val();
            var school = $("input[name=school]").val();
            var project = $("input[name=project]").val();
            console.log(gender)
            $.ajax({
                type: "POST",
                url: 'php/upInfo.php',
                dataType: "json",
                data: {
                    id: localStorage.getItem("id"),
                    username: username ? username : '',
                    gender: gender ? gender : '',
                    age: age ? age : gender,
                    address: address ? address : '',
                    phone: phone ? phone : '',
                    school: school ? school : '',
                    project: project ? project : ''
                },
                success: function (data) {
                    if (data == 1) {
                        maskHide();
                        $(".up_info").hide();
                        alert('信息修改成功！','success',function(){
                            getInfo(function () {
                                $(".uf_top p").html(info['username']);
                                $(".user_name").html(info['username']);
                                localStorage.setItem('username', info['username'])
                            });
                            $("input[name=username]").val('');
                            $("input[name=gender]:checked").val('');
                            $("input[name=age]").val('');
                            $("input[name=address]").val('');
                            $("input[name=phone]").val('');
                            $("input[name=school]").val('');
                            $("input[name=project]").val('');
                        })
                    } else {
                        alert('修改失败，请确认信息无误后再操作','error');
                    }
                }
            })
        })
    })
</script>
</html>