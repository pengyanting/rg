<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="js/bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
    <div class="test">
        <div class="title">
            <a href="javascript:;" class="back"><i class="back_btn"></i>返回课程主页</a>
        </div>
        <div class="container w1180">
            <div class="test-detail">
                <div class="hd">
                    <h3>{{result.paperName}}</h3>
                </div>
                <div class="bd">
                    <form>
                        <div class="question-list">
                            {{each result.questionVOList}}                  
                            <div class="que-title">
                                <span class="type-name">主观题</span>
                            </div>
                            <div class="question-item">
                                <div class="question-info">
                                    <div class="info">{{$value.content}}</div>
                                    <div class="answer">
                                        <input type="file" name="file" value="上传视频">
                                    </div>
                                </div>
                            </div>  
                            {{/each}}
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
</html>