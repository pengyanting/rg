<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>软件类课程智能云课堂</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/xcConfirm.css"/>
    <link rel="stylesheet" type="text/css" href="css/course.css" />
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
                <li class="active"><a href="course.php">课程中心</a></li>
                <li><a href="task.php">我的任务</a></li>
                <li><a href="message.php">消息中心</a></li>
                <li><a href="user.php">个人中心</a></li>
            </ul>
        </div>
    </div>
    <div class="course_type">
        <div style='padding:0 50px;'>
            <ul class="ct_con clearfix" id='direction'>
                <li class="ct_title">方向：</li>
                <li class="active">全部</li>
                <li>可视化编程 </li>
                <li>WEB应用程序设计</li>
                <li>软件测试 </li>
                <li>数据库管理 </li>
                <li>图形图像制作 </li>
                <li>网络构建技术</li>
                <li>网络系统管理 </li>
                <li>多媒体制作</li>
                <li>计算机办公应用</li>
            </ul>
            <ul class="ct_con clearfix" id='type'>
                <li class="ct_title">类型：</li>
                <li class="active">全部</li>
                <li>基础 </li>
                <li>中级</li>
                <li>高级 </li>
                <li>实战案例</li>
                <li>工具软件</li>
            </ul>
            <div class="ct_search clearfix">
                <div class="search clearfix">
                    <label for="">搜索课程：</label>
                    <input type="text" placeholder="课程名称">
                    <img src="img/search.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="page_bg " style='padding-bottom:50px;'>
        <div class='nologin hide'>
            <img src="img/nologin.png" alt="">
            <p>没有符合搜索项的课程哦！</p>
        </div>
        <div class="course-list clearfix">
            <!--<div class="course-item">
                <a href="coursedetail.php">
                    <img src="img/course-pic.png" alt="">
                </a>
                <h3 class="title">发动机的维修与保养</h3>
                <p class="teacher"><i class="icon-teacher"></i>张晓老师</p>
            </div>-->
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
<script src="js/jquery.js"></script>
<script src="js/xcConfirm.js" type="text/javascript" charset="utf-8"></script>
<script src='js/common.js'></script>
<script>
    $(function () {
        $(".ct_con li:not('.ct_title')").click(function () {
            $(this).addClass("active").siblings().removeClass("active");
        })
        //页面加载完成获取所有课程
       
        var sql="select * from courses where 1=1 "
        function selCourse(){
            $.ajax({
            url: 'php/manage/selectcourse.php',
            type: 'POST',
            dataType: 'json',
            data: {
              sql:sql
            },
            success: function (data) {
                 sql="select * from courses where 1=1 "
                if (data.length>0) {
                    var str = '';
                    for (var i = 0; i < data.length; i++) {
                        str += ' <div class="course-item">' +
                            '<a href="coursedetail.php?courseId='+data[i].id+'">' +
                            '<img src="'+data[i].imgurl+'" alt="">' +
                            '<h3 class="title">'+data[i].title+'</h3>' +
                            '<p class="teacher"><i class="icon-teacher"></i>'+data[i].teacher+'</p>' +
                            '</a>' +
                            '</div>'
                    }
                    $('.course-list').html(str);
                     $('.nologin').hide();
                }else{
                    $('.nologin').show();
                    $('.course-list').html('');
                }
              }
          })
        }
        selCourse(sql);
        $("#direction li").click(function(){
            var type=$("#type .active").html();
            var direction=$(this).html();
            var title=$('.search input').val();
            if(type!="全部"){
                sql+="and type ='"+type+"' "
            }
            if(direction!='全部'){
                sql+="and direction ='"+direction+"' "
            }
            if(title!=''){
                sql+="and title like '"+title+"%' "
            }
             selCourse(sql);
        })
         $("#type li").click(function(){
            var direction=$("#direction .active").html();
            var type=$(this).html();
            var title=$('.search input').val();
            if(type!="全部"){
                sql+="and type ='"+type+"' "
            }
            if(direction!='全部'){
                sql+="and direction ='"+direction+"' "
            }
            if(title!=''){
                sql+="and title like '%"+title+"%' "
            }
             selCourse(sql);
        })
        $('.search img').click(function(){
            var direction=$("#direction .active").html();
            var type=$("#type .active").html();
            if(type!="全部"){
                sql+="and type ='"+type+"' "
            }
            if(direction!='全部'){
                sql+="and direction ='"+direction+"' "
            }
            var title=$('.search input').val();
            if(title!=''){
                 sql+="and title like '%"+title+"%' "
            }
             selCourse(sql);
        })
        $('.search input').keyup(function(e){
            console.log(e.keyCode)
            if(e.keyCode=='13'){
                var direction=$("#direction .active").html();
                var type=$("#type .active").html();
                if(type!="全部"){
                    sql+="and type ='"+type+"' "
                }
                if(direction!='全部'){
                    sql+="and direction ='"+direction+"' "
                }
                var title=$('.search input').val();
                if(title!=''){
                    sql+="and title like '%"+title+"%' "
                }
                selCourse(sql);
            }
        })
    })
</script>
</html>