<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>软件类课程智能云课堂</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/xcConfirm.css"/>
    <link rel="stylesheet" type="text/css" href="css/task.css" />
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
                <li class="active"><a href="task.php">我的任务</a></li>
                <li><a href="message.php">消息中心</a></li>
                <li><a href="user.php">个人中心</a></li>
            </ul>
        </div>
    </div>
    <div class="page_bg">
        <div class="ykt_banner"></div>
        <div class="page_content">
            <div class="panel_nav_btn">
                <a href="javascript:;" class="btn course_btn active">未提交</a>
                <a href="javascript:;" class="btn course_btn">未批阅</a>
                <a href="javascript:;" class="btn course_btn">已完成</a>
                <a href="javascript:;" class="btn course_btn">已过期</a>
            </div>
            <div class='nologin hide'>
                <img src="img/nologin.png" alt="">
                <p>你还没有登陆，暂时不能做任务哦！<a href="login.php">快去登录吧！</a></p>
            </div>
            <div class="task-list clearfix">
                <!--<div class="task-item">
                    <div class="task-info t-wtj">
                        <div class="tit">
                            <h3 class="title">拆除发动机</h3>
                            <span class="label b_label">项目测试</span>
                            <span class="label p_label">25道题</span>
                        </div>
                        <p class="info">发动机的维修与保养</p>
                        <p class="time_num">本学期第3次课</p>
                        <span class="time">03-20 14:20</span>
                    </div>
                </div>-->
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
</body>
<script src='js/jquery.js'></script>
<script src="js/xcConfirm.js" type="text/javascript" charset="utf-8"></script>
<script src='js/common.js'></script>
<script>
    $(function () {
        //判断是否登录
        if (!localStorage.getItem('username')) {
            $(".nologin").show();
            $(".task-list").hide();
            return;
        }
        //查询任务
        function seltask(status) {
            $.ajax({
                url: 'php/task/selbyuser.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    status: status,
                    userid: localStorage.getItem('id')
                },
                success: function (data) {
                    var str = '';
                    if (data.length <= 0) {
                        $('.nologin').show();
                        $(".task-list").hide();
                        $(".nologin p").html("暂时没有相关任务哦!");
                        return;
                    }
                    $('.nologin').hide();
                    $(".task-list").show();
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].status == '未提交') {
                            var classname = 't-wtj';
                        } else if (data[i].status == '未批阅') {
                            var classname = 't-wpy';
                        } else if (data[i].status == '已完成') {
                            var classname = 't-ywc';
                        } else if (data[i].status == '已过期') {
                            var classname = 't-ygq';
                        }
                        str += '<div class="task-item" taskid="'+data[i].id+'" status="' + data[i].status + '" id="' + data[
                                i].taskid + '">' +
                            '<div class="task-info ' + classname + '">' +
                            '<div class="tit">' +
                            '<h3 class="title">' + data[i].title + '</h3>' +
                            '<span class="label b_label">' + data[i].type + '</span>' +
                            '<span class="label p_label">' + data[i].num + '道题</span>' +
                            '</div>' +
                            '<p class="info">' + data[i].descript + '</p>' +
                            '<p class="time_num">' + data[i].coursetitle + '</p>' +
                            '<span class="time">' + data[i].time + '</span>' +
                            '</div>' +
                            '</div>'
                    }
                    $(".task-list").html(str);
                }
            })
        }
        seltask('未提交');
        $(".task-list").on('click', '.task-item', function () {
            
            var id = $(this).attr('id');
            var taskid=$(this).attr("taskid");
            var status = $(this).attr("status");
            if (status == '已过期') {
                alert("任务已过期，请查看最新任务");
                return;
            }
            window.location = 'test.php?' + 'taskid=' + id+'&id='+taskid
        })
        //tab
        $(".panel_nav_btn a").click(function () {
            var status = $(this).html();
            seltask(status);
        })
    })
</script>
</html>