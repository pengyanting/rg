<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/xcConfirm.css"/>
    <link rel="stylesheet" type="text/css" href="css/task.css" />
</head>

<body>
    <div class="test">
        <div class="title">
            <a href="task.php" class="back"><i class="back_btn"></i>返回任务列表</a>
        </div>
        <div class="container w1180">
            <div class="test-detail">
                <div class="hd">
                    <h3></h3>
                </div>
                <div class="bd">
                     <div class='nologin hide'>
                    <img src="img/nologin.png" alt="">
                    <p>暂无试题信息</p>
                </div>
                    <form name="test_form" id="test_form">
                        <div class="question-list">
                            <div class="que-title">
                                <span class="type-name"></span>
                            </div>
                            <!--<div class="question-item">
                                <div class="question-info">
                                    <div class="info">啊实打实</div>
                                    <div class="option-list">
                                        <div class="item">
                                            <input type="radio" name="ques_{{$index}}" value="A" class="option">{{$value.optionA}}
                                        </div>
                                        <div class="item">
                                            <input type="radio" name="ques_{{$index}}" value="B" class="option">{{$value.optionB}}
                                        </div>
                                        <div class="item">
                                            <input type="radio" name="ques_{{$index}}" value="C" class="option">{{$value.optionC}}
                                        </div>
                                        <div class="item">
                                            <input type="radio" name="ques_{{$index}}" value="D" class="option">{{$value.optionD}}
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <div class="submit-bottom">
                            <input type="button" id="test_submit_btn" value="提  交" class="btn submit_q_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src='js/jquery.js'></script>
<script src="js/xcConfirm.js" type="text/javascript" charset="utf-8"></script>
<script src='js/common.js'></script>
<script>
    $(function () {
        //加载试题
        $.ajax({
            url: 'php/task/seltestbytask.php',
            type: 'POST',
            dataType: 'json',
            data: {
                taskid: GetQueryString('taskid')
            },
            success: function (data) {
                if (data.length <= 0) {
                    $(".nologin").show();
                    $("#test_form").hide();
                    return;
                }
                var str = '';
                $(".type-name").html(data[0].type);
                $(".hd h3").html(data[0].tasktitle)
                for (var i = 0; i < data.length; i++) {
                    str += '<div class="question-info"><img class="img' + data[i].id + '" src=""/>' +
                        '<div class="info">' + (i + 1) + '、' + data[i].title + '</div>' +
                        '<div class="option-list" id="' + data[i].id + '">' +
                        '<div class="item">' +
                        '<input type="radio" name="ques' + data[i].id +
                        '" value="A" class="option">' +
                        data[i].sel1 +
                        '</div>' +
                        '<div class="item">' +
                        '<input type="radio" name="ques' + data[i].id +
                        '" value="B" class="option">' +
                        data[i].sel2 +
                        '</div>' +
                        '<div class="item">' +
                        '<input type="radio" name="ques' + data[i].id +
                        '" value="C" class="option">' +
                        data[i].sel3 +
                        '</div>' +
                        '<div class="item">' +
                        '<input type="radio" name="ques' + data[i].id +
                        '" value="D" class="option">' +
                        data[i].sel4 +
                        '</div>' +
                        '</div>' +
                        '</div>'
                }
                $(".question-list").append(str);
            }
        })
        //获取任务状态
        var taskstatus;
        $.ajax({
            url: 'php/task/seltaskbyid.php',
            type: 'POST',
            dataType: 'json',
            data: {
                taskid: GetQueryString('id'),
            },
            success: function (data) {
                if (data.length > 0) {
                    taskstatus = data[0].status;
                    var list = $(".option-list");
                    if (taskstatus == '未批阅') {
                        getAnswer(list)
                    } else if (taskstatus == '已完成') {
                        //判断答案正确性
                        $("#test_submit_btn").attr('disabled', true);
                        checkTask()
                    }
                }
            }
        })
        //提交答案
        $("#test_submit_btn").click(function () {
            var list = $(".option-list");
            if (taskstatus == '未批阅') {
                alert('答案已提交，不能重复提交，请耐心等待结果','warning')
                return;
            }
            var answer = [];
            for (var i = 0; i < list.length; i++) {
                var testid = $(list[i]).attr('id');
                var value = $(list[i]).find('input:checked').val();
                answer.push(testid + '-' + value)
            }
            $.ajax({
                url: 'php/insertresult.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: GetQueryString('id'),
                    answer: answer.toString(),
                    userid: localStorage.getItem('id'),
                },
                success: function (data) {
                    if (data = '11') {
                        alert('提交成功，在管理人员批阅后可在我的消息中收到答题结果通知','success');
                        window.location = 'task.php'
                    }
                }
            })
        })
        //获取答案
        function getAnswer(list) {
            $.ajax({
                url: 'php/selresult.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    taskid: GetQueryString('id'),
                    userid: localStorage.getItem('id')
                },
                success: function (data) {
                    if (data) {
                        var answerlist = data[0].answer.split(",");
                        for (var i = 0; i < answerlist.length; i++) {
                            var id = answerlist[i].split("-")[0];
                            var answer = answerlist[i].split("-")[1];
                            $("[name=ques" + id + "]").attr('disabled', true)
                            $("[name=ques" + id + "]")[0].checked = answer
                        }
                    }
                }
            })
        }
        //判断答案正确性
        function checkTask() {
            $.ajax({
                url: 'php/selresult.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    taskid: GetQueryString('id'),
                    userid: localStorage.getItem('id')
                },
                success: function (data) {
                    if (data) {
                        var answerlist = data[0].answer.split(",");
                        for (var i = 0; i < answerlist.length; i++) {
                            var id = answerlist[i].split("-")[0];
                            var answer = answerlist[i].split("-")[1];
                            $("[name=ques" + id + "]").attr('disabled', true);
                            $("[name=ques" + id + "]")[0].checked = answer;
                            selAnswer(id, answer)
                        }
                    }
                }
            })
        }
        //查询单个试题答案
        function selAnswer(testid, answer) {
            $.ajax({
                url: 'php/task/selanswer.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: testid
                },
                success: function (data) {
                    if (data[0].answer == answer) {
                        $(".img" + testid).attr('src', 'img/icon-correct.png')
                    } else {
                        $(".img" + testid).attr('src', 'img/icon-error.png')
                    }
                }
            })
        }
    })
</script>

</html>