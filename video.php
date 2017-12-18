<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/course.css" />
    <link href="js/video-js.css" rel="stylesheet">
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
                <li  class="active"><a href="course.php">课程中心</a></li>
                <li><a href="task.php">我的任务</a></li>
                <li><a href="message.php">消息中心</a></li>
                <li><a href="user.php">个人中心</a></li>
            </ul>
        </div>
    </div>
    <div class="cour_detail">
        <div class="m">
            <video id="my-video" src='' class="video-js" controls autoplay width="100%" height="400"></video>
        </div>
        <div class="all_info  w1180">
            <div class="detail-nav">
                <ul>
                    <li class="active" data-cps-role="tabnav">简介</li>
                    <li data-cps-role="tabnav">目录</li>
                    <li data-cps-role="tabnav">任务</li>
                    <li data-cps-role="tabnav">评论</li>
                </ul>
            </div>
            <div class="panel-list">
                <!--简介-->
                <div class="panel" data-cps-role="tabpannel">
                    <div class="intro">
                        <h3 class="name-tit">课程名称</h3>
                        <p id='name-tit'></p>
                        <h3 class="teacher-tit">主讲教师</h3>
                        <p id="teacher-tit"></p>
                        <h3 class="mode-tit">考核方式</h3>
                        <p id='mode-tit'></p>
                        <h3 class="info-tit">课程介绍</h3>
                        <p id='info-tit'></p>
                    </div>
                </div>
                <!--目录-->
                <div class="panel hide" data-cps-role="tabpannel">
                     <div class='nologin hide'>
                        <img src="img/nologin.png" alt="">
                        <p>暂无相关章节</a></p>
                    </div>
                    <div class="mulu-box"></div>
                </div>
                <!--任务-->
                <div class="panel hide" data-cps-role="tabpannel">
                     <div class='nologin hide'>
                        <img src="img/nologin.png" alt="">
                        <p>暂无相关任务</a></p>
                    </div>
                    <div class="task-list clearfix"></div>
                    <div class="pager" id="pager" data-pageCount="" data-pageSize='6'></div>
                </div>
                <!--评论-->
                <div class="panel hide" data-cps-role="tabpannel">
                    <div class='nologin hide'>
                        <img src="img/nologin.png" alt="">
                        <p>你还没有登陆，暂时不能发表评论哦！<a href="login.php">快去登录吧！</a></p>
                    </div>
                    <div class='discus'>
                        <div class='discus_input'>
                            <img src="img/noavatar.png" alt="">
                            <textarea placeholder='点赞、吐槽、表扬，留下你想说的。'></textarea><br>
                            <input type="button" value="发表评论" class='discus_btn'>
                        </div>
                        <div class='discus_box'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--底部-->
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
    <div class="dialog" style="width:600px; height:400px; margin-top: -200px; margin-left: -300px;">
        <div id="video" style="position:relative;z-index: 100;width:600px;height:400px;">
            <div id="a1"></div>
        </div>
    </div>
    <div class="mask"></div>
</body>
<script src="js/jquery.js"></script>
<script src="js/xcConfirm.js" type="text/javascript" charset="utf-8"></script>
<script src="js/common.js"></script>
<script>
    $(function () {
        //展开缩起目录
        var mulu_title = $(".mulu-title")
        if (mulu_title.length > 1) {
            $(".mulu-btn").show();
        }
        $(".mulu-box").on('click', '.mulu-title', function () {
            var index = $(this).index(".mulu-title");
            $(".mulu-con").hide();
            $(this).siblings(".mulu-con").show();
        })
        //设置播放路径
        $("#my-video").attr('src', localStorage.getItem('videourl'))
        //页面初始化
        $.ajax({
            url: 'php/manage/selectcoursedetail.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: GetQueryString("courseId")
            },
            success: function (data) {
                //面包屑
                $(".crumbs").html("课程中心/课程详情/" + data[0].title);

                //简介
                $("#name-tit").html(data[0].title);
                $("#teacher-tit").html(data[0].teacher + " | 4个课次");
                $("#mode-tit").html(data[0].examtype);
                $("#info-tit").html(data[0].descript);

                //banner
                $(".coourse_info h1").html(data[0].title);
                $("coourse_info .study_btn").attr("videoUrl", "");
                $(".coourse_info ul li").eq(0).html(data[0].type);
                $(".coourse_info ul li").eq(1).html(data[0].direction);
                $(".coourse_info ul li").eq(2).html(data[0].score + "分");
            }
        })
        //查询评论
        if (localStorage.getItem("username")) {
            $(".discus").show();
            $(".nologin").eq(3).hide();
            selectDiscus();
        } else {
            $(".nologin").eq(3).show();
            $(".discus").hide();
        }

        function selectDiscus() {
            $.ajax({
                url: 'php/selectdiscus.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    courseid: GetQueryString("courseId")
                },
                success: function (data) {
                    var str = "";
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            str += "<div class='discus_item'>" +
                                "<div class='discus_img'><img src='img/noavatar.png' alt=''></div>" +
                                "<div class='discus_con'>" +
                                "<p class='username'>" + data[i].username + "</p>" +
                                "<p class='con'>" + data[i].content + "</p>" +
                                "<p class='time'>时间：" + data[i].time + "</p>" +
                                "</div>" +
                                "</div>"
                        }
                    } else {
                        str = "<p style='text-align:center;margin-top:30px;color:#ccc;'>暂无评论</p>"
                    }
                    $(".discus_box").html(str);
                }
            })
        }
        //发表评论
        $(".discus_btn").click(function () {
            var content = $(".discus_input textarea").val();
            var time = getNowFormatDate();
            if (!content) {
                alert("评论内容不能为空哦！",'warning');
                retur;
            }
            $.ajax({
                url: 'php/discusadd.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    username: localStorage.getItem("username"),
                    courseid: GetQueryString("courseId"),
                    content: content,
                    time: time
                },
                success: function (data) {
                    if (data == 1) {
                        $(".discus_input textarea").val('');
                        selectDiscus();
                    } else {
                        alert("发表评论失败！",'error')
                    }
                }
            })
        })
        var datalist;
        //查询任务
        $.ajax({
            url: 'php/task/seltaskbycourse.php',
            type: 'POST',
            dataType: 'json',
            data: {
                courseid: GetQueryString("courseId"),
            },
            success: function (data) {
                if (data.length>0) {
                    var str = '';
                    datalist = data;
                    for (var i = 0; i < data.length; i++) {
                        str += '<div class="task-item" username="' + data[i].username + '" id="' +
                            data[i].id + ' "userid="' + data[i].userid + '">' +
                            '<div class="task-info t-wtj">' +
                            '<div class="tit">' +
                            '<h3 class="title">' + data[i].title + '</h3>' +
                            '<span class="label b_label">' + data[i].type + '</span>' +
                            '<span class="label p_label">' + data[i].num + '道题</span>' +
                            '</div>' +
                            '<p class="info">' + data[i].coursetitle + '</p>' +
                            '<p class="time_num">' + data[i].descript + '</p>' +
                            '<div class="time">' +
                            '<span class="st">MM-dd hh:mm</span>' +
                            '<span class="region-line"></span>' +
                            '<span class="et">MM-dd hh:mm</span>' +
                            '</div>' +
                            '</div>' +
                            '<i class="t-status "></i>' +
                            '</div>'
                    }
                    $(".task-list").html(str);
                }else{
                    $(".nologin").eq(1).show();
                }
            }
        })

         $(".task-list").on('click', '.task-item', function () {
             
             if (!localStorage.getItem('username')) {
                  alert('您还未登陆,登陆之后再来做题哦！','warning',function(){
                     window.location='login.php'
                  })
                  return;
              }
            var taskid = $(this).attr('id');
            var username = $(this).attr('username');
            var userid = $(this).attr('userid');
            var status = $(this).attr('status');
            var datalist = $(this).attr('datalist');
            var index = $(this).index();
            if (status == "已过期") {
                alert('任务已过期，请查看最新任务');
                return;
            }
            //判断是否第一次点击
            check(taskid, index)
        })
        //判断是否第一次点击任务
        function check(taskid, index) {
            $.ajax({
                url: 'php/task/seltasklist.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    taskid: taskid,
                    userid: localStorage.getItem('id')
                },
                success: function (data) {
                    if (data.length > 0) {
                        window.location = 'test.php?' + 'taskid=' + taskid + '&id=' + data[0].id;
                    } else {
                        firstTask(index)
                    }
                }
            })
        }
         //用户首次点击任务
        function firstTask(index) {
            console.log(datalist)
            $.ajax({
                url: 'php/task/upstudytype.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    title: datalist[index].title,
                    taskid: datalist[index].id,
                    num: datalist[index].num,
                    descript: datalist[index].descript,
                    status: '未提交',
                    type: datalist[index].type,
                    time: datalist[index].time,
                    courseid: datalist[index].courseid,
                    coursetitle: datalist[index].coursetitle,
                    username: localStorage.getItem('username'),
                    userid: localStorage.getItem('id')
                },
                success: function (data) {
                    if (data) {
                        check(datalist[index].id, index)
                    }
                }
            })
        }

        //查询目录
        var titleArr = [];

        function selcatalogbycourse(fun) {
            $.ajax({
                url: 'php/selcatalogbycourse.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    courseid: GetQueryString("courseId")
                },
                success: function (data) {
                    if(data.length<=0){
                        $(".nologin").eq(0).show();
                        return;
                    }
                    for (var i = 0; i < data.length; i++) {
                        titleArr.push(data[i].title)
                    }
                    titleArr = outRepeat(titleArr);
                    //通过title查找章节

                    for (var i = 0; i < titleArr.length; i++) {
                        var hideclass = 'hide'
                        if (i == 0) {
                            hideclass = ''
                        }
                        var str = '<div class="mulu-list muluList' + i + '">' +
                            '<div class="mulu-title clearfix">' +
                            '<h1>' + titleArr[i] + '</h1>' +
                            '<img src="img/arrows-down.png" alt="">' +
                            '</div>' +
                            '<div class="mulu-con ' + hideclass + '">' +
                            '<ul></ul>' +
                            '</div>' +
                            '</div>'
                        $(".mulu-box").append(str);
                    }
                    fun();
                }
            })
        }
        selcatalogbycourse(function () {
            for (var i = 0; i < titleArr.length; i++) {
                selcatalogbytitle(titleArr[i], i)
            }
        })
        //通过title查询目录
        function selcatalogbytitle(title, index) {
            $.ajax({
                url: 'php/selcatalogbytitle.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    courseid: GetQueryString("courseId"),
                    title: title
                },
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        var userid = data[i].userid.split(",");
                        var status = '去学习';
                        if (localStorage.getItem('username')) {
                            if (userid.indexOf(localStorage.getItem('id')) == '-1') {
                                status = '去学习'
                            } else {
                                status = '学习中'
                            }
                        }
                        var str = '<li userid="' + data[i].userid + '" username="' + data[i].username +
                            '" id="' + data[i].id + '" videourl="' + data[i].videourl + '">' + data[
                                i].content +
                            '<span>' + status + '</span></li>'
                        $(".muluList" + index + ' ul').append(str);
                    }
                }
            })
        }
        //跳转视频播放页
        $(".mulu-box").on('click', 'li', function () {
            if (!localStorage.getItem('username')) {
                alert('您还未登陆，登陆后继续学习','warning',function(){
                   window.location = 'login.php';
                });
                
                return;
            }
            var courseId = GetQueryString("courseId");
            var videourl = $(this).attr('videourl');
            localStorage.setItem('videourl', videourl)


            var id = $(this).attr('id');
            var username = $(this).attr('username');
            var userid = $(this).attr('userid');
            var nameArr = [];
            var idArr = [];
            if (!userid) {
                firstTaskVideo(id, localStorage.getItem('username'), localStorage.getItem("id"),courseId);
                return;
            }
            idArr = userid.split(",");
            nameArr = username.split(",");
            if (idArr.indexOf(localStorage.getItem('id')) == "-1") {
                idArr.push(localStorage.getItem("id"))
                nameArr.push(localStorage.getItem('username'))
                firstTaskVideo(id, nameArr.toString(), idArr.toString(),courseId)
            } else {
                window.location = 'video.php?courseId=' + courseId
            }
        })
        //用户首次点击播放视频
        function firstTaskVideo(taskid, username, userid,courseId) {
            $.ajax({
                url: 'php/task/upcatalog.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: taskid,
                    username: username,
                    userid: userid
                },
                success: function (data) {
                    if (data) {
                        window.location = 'video.php?courseId=' + courseId
                    }
                }
            })
        }
    })
</script>


</html>