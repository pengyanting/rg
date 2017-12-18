
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
                    <h3>{{textPaperName}}</h3>
                </div>
                <div class="bd">
                    {{if totalNum > 0}}
                    <div class="result-info clearfix">
                        <div class="result-type">
                            <div class="clearfix">
                                <div class="result-item">
                                    <div class="columnar"></div>
                                    <span>{{totalNum}}</span>
                                </div>
                                <div class="result-item">
                                    <div class="columnar" style="height: {{correctNum/totalNum*150}}px"></div>
                                    <span>{{correctNum}}</span>
                                </div>  
                            </div>
                            <div class="type-bottom"></div>
                            <span class="type-name">总题数</span>
                            <span class="type-name">答对题</span>
                        </div>
                        <div class="result-type">
                            <div class="clearfix">
                                <div class="result-item">
                                    <div class="columnar"></div>
                                    <span>{{correctNum01+wrongNum01}}</span>
                                </div>
                                <div class="result-item">
                                    <div class="columnar" style="height: {{correctNum01/(correctNum01+wrongNum01)*150}}px"></div>
                                    <span>{{correctNum01}}</span>
                                </div>
                            </div>
                            <div class="type-bottom"></div>
                            <span class="type-name">单选题<br>总题数</span>
                            <span class="type-name">答对题</span>
                        </div>
                        <div class="result-type">
                            <div class="clearfix">
                                <div class="result-item">
                                    <div class="columnar"></div>
                                    <span>{{correctNum02+wrongNum02}}</span>
                                </div>
                                <div class="result-item">
                                    <div class="columnar" style="height: {{correctNum02/(correctNum02+wrongNum02)*150}}px"></div>
                                    <span>{{correctNum02}}</span>
                                </div>
                            </div>
                            <div class="type-bottom"></div>
                            <span class="type-name">多选题<br>总题数</span>
                            <span class="type-name">答对题</span>
                        </div>
                        <div class="result-type">
                            <div class="clearfix">
                                <div class="result-item">
                                    <div class="columnar"></div>
                                    <span>{{correctNum03+wrongNum03}}</span>
                                </div>
                                <div class="result-item">
                                    <div class="columnar" style="height: {{correctNum03/(correctNum03+wrongNum03)*150}}px"></div>
                                    <span>{{correctNum03}}</span>
                                </div>
                            </div>
                            <div class="type-bottom"></div>
                            <span class="type-name">是非题<br>总题数</span>
                            <span class="type-name">答对题</span>
                        </div>
                    </div>
                    {{/if}}
                    <div class="question-list">
                        {{if correctNum01+wrongNum01 > 0}}
                        <div class="que-title">
                            <span class="type-name">单选题</span>
                            <span class="type-result">共8题 正确3题</span>
                        </div>
                        {{each questionResultList}}
                        {{if $value.questionType == 10070001}}
                        <div class="question-item">
                            <div class="question-info">
                                <div class="info">
                                {{$value.questionContent}}
                                </div>
                                <div class="option-list">
                                    <div class="item">
                                        <input type="radio" name="ques_{{$index}}" {{if $value.choosedAnswer == 'A'}}checked{{/if}} value="A" class="option" disabled="disabled">{{$value.optionA}}
                                    </div>
                                    <div class="item">
                                        <input type="radio" name="ques_{{$index}}" {{if $value.choosedAnswer == 'B'}}checked{{/if}} value="B" class="option" disabled="disabled">{{$value.optionB}}
                                    </div>
                                    <div class="item">
                                        <input type="radio" name="ques_{{$index}}" {{if $value.choosedAnswer == 'C'}}checked{{/if}} value="C" class="option" disabled="disabled">{{$value.optionC}}
                                    </div>
                                    <div class="item">
                                        <input type="radio" name="ques_{{$index}}" {{if $value.choosedAnswer == 'D'}}checked{{/if}} value="D" class="option" disabled="disabled">{{$value.optionD}}
                                    </div>
                                </div>
                            </div>
                            <div class="correct-info">
                                <p><span>正确答案：{{$value.correctAnswer}}</span></p>
                                <p><span>题目解析：{{$value.parse}}</span></p>
                            </div>
                            {{if $value.questionResult == '对'}}
                            <i class="res_icon res_correct"></i>
                            {{else if $value.questionResult == '错'}}
                            <i class="res_icon res_error"></i>
                            {{/if}}
                        </div>
                        {{/if}}
                        {{/each}}
                        {{/if}}

                        {{if correctNum02+wrongNum02 > 0}}
                        <div class="que-title">
                            <span class="type-name">多选题</span>
                            <span class="type-result">共8题 正确3题</span>
                        </div>
                        {{each questionResultList}}
                        {{if $value.questionType == 10070002}}
                        <div class="question-item">
                            <div class="question-info">
                                <div class="info">
                                {{$value.questionContent}}
                                </div>
                                <div class="option-list">
                                    <div class="item">
                                        <input type="checkbox" name="ques_{{$index}}" {{if $value.choosedAnswer == 'A'}}checked="checked"{{/if}} value="A" class="option" disabled="disabled">{{$value.optionA}}
                                    </div>
                                    <div class="item">
                                        <input type="checkbox" name="ques_{{$index}}" {{if $value.choosedAnswer == 'B'}}checked="checked"{{/if}} value="B" class="option" disabled="disabled">{{$value.optionB}}
                                    </div>
                                    <div class="item">
                                        <input type="checkbox" name="ques_{{$index}}" {{if $value.choosedAnswer == 'C'}}checked="checked"{{/if}} value="C" class="option" disabled="disabled">{{$value.optionC}}
                                    </div>
                                    <div class="item">
                                        <input type="checkbox" name="ques_{{$index}}" {{if $value.choosedAnswer == 'D'}}checked="checked"{{/if}} value="D" class="option" disabled="disabled">{{$value.optionD}}
                                    </div>
                                </div>
                                {{if $value.questionResult == '对'}}
                                <i class="res_icon res_correct"></i>
                                {{else if $value.questionResult == '错'}}
                                <i class="res_icon res_error"></i>
                                {{/if}}
                            </div>
                            <div class="correct-info">
                                <p><span>正确答案：{{$value.correctAnswer}}</span></p>
                                <p><span>题目解析：{{$value.parse}}</span></p>
                            </div>
                        </div>
                        {{/if}}
                        {{/each}}
                        {{/if}}

                        {{if correctNum03+wrongNum03 > 0}}
                        <div class="que-title">
                            <span class="type-name">对错题</span>
                            <span class="type-result">共8题 正确3题</span>
                        </div>
                        {{each questionResultList}}
                        {{if $value.questionType == 10070003}}
                        <div class="question-item">
                            <div class="question-info">
                                <div class="info">
                                {{$value.questionContent}}
                                </div>
                                <div class="option-list">
                                    <div class="item">
                                        <input type="radio" name="ques_{{$index}}" {{if $value.choosedAnswer == 'A'}}checked{{/if}} value="A" class="option" disabled="disabled">{{$value.optionA}}
                                    </div>
                                    <div class="item">
                                        <input type="radio" name="ques_{{$index}}" {{if $value.choosedAnswer == 'B'}}checked{{/if}} value="B" class="option" disabled="disabled">{{$value.optionB}}
                                    </div>
                                </div>
                                {{if $value.questionResult == '对'}}
                                <i class="res_icon res_correct"></i>
                                {{else if $value.questionResult == '错'}}
                                <i class="res_icon res_error"></i>
                                {{/if}}
                            </div>
                            <div class="correct-info">
                                <p><span>正确答案：{{$value.correctAnswer}}</span></p>
                                <p><span>题目解析：{{$value.parse}}</span></p>
                            </div>
                        </div>
                        {{/if}}
                        {{/each}}
                        {{/if}}

                        {{if totalNum-(correctNum01+wrongNum01+correctNum02+wrongNum02+correctNum03+wrongNum03) > 0}}
                        <div class="que-title">
                            <span class="type-name">主观题</span>
                        </div>
                        {{each questionResultList}}
                        {{if $value.questionType == 10070006}}
                        <div class="question-item">
                            <div class="question-info">
                                <div class="info">
                                {{$value.questionContent}}
                                </div>
                                {{if $value.questionResult == '对'}}
                                <i class="res_icon res_correct"></i>
                                {{else if $value.questionResult == '错'}}
                                <i class="res_icon res_error"></i>
                                {{/if}}
                            </div>
                            <div class="correct-info">
                                <p><span>正确答案：{{$value.correctAnswer}}</span></p>
                                <p><span>题目解析：{{$value.parse}}</span></p>
                            </div>
                        </div>
                        {{/if}}
                        {{/each}}
                        {{/if}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>