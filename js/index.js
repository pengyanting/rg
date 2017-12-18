
$(function(){

	var n_index = 0;
	//取当前URL最后一个 / 后面的文件名，pop方法是删除最后一个元素并返回最后一个元素
	var links = $('.nav li a');
	var urlArr = location.pathname.split('?')[0].split('/');
	var url	= urlArr.pop();
	//如果有取到, 则进行匹配, 否则默认为首页(即index的值所指向的那个)
	function getNavIndex(links,urlArr,url){
		if(url){
	        for (var i=links.length; i--;) {//遍历 menu 的中连接地址
	            if(links[i].href.indexOf(url) !== -1){
	           		return i;
	            }else{
	            	for(var j = urlArr.length-1; j > 0;j--){
	            		if(links[i].href.indexOf(urlArr[j]) !== -1){
	            			return i;
	            		}
	            	}
	            }
	        }
	    }
	}
    var n_i = getNavIndex(links,urlArr,url);
    n_index = n_i ? n_i : n_index;
	$('.nav li').eq(n_index).addClass('active');

	var sst_layer;
	$('.more-a').click(function(e){
		e.stopPropagation();
		if(sst_layer){
			sst_layer.remove();
			sst_layer = null;
		}
		sst_layer = $('<div class="stt_layer"></div>');
		$(this).parents('.c-l').find('.c-t-c').each(function(){
			var ci = $('<div class="ci"></div>');
			ci.append($('<p>').text('课程名称：'+$(this).find('p').eq(0).text()));
			ci.append($('<p>').text('授课班级：'+$(this).find('p').eq(1).text()));
			ci.append($('<p>').text('授课时间：'+$(this).find('p').eq(2).text()));
			ci.append($('<p>').text('授课地点：'+$(this).find('p').eq(3).text()));			
			sst_layer.append(ci);
		});
		$('body').append(sst_layer);
		var t = $(this).offset().top - sst_layer.height()/2;
		var l = $(this).offset().left + 85;
		sst_layer.css({top:t,left:l})
		$(document).on('click',function(){
			sst_layer.remove();
		})
	})

	$('.w-c-i').click(function(e){
		e.stopPropagation();
		if(sst_layer){
			sst_layer.remove();
			sst_layer = null;
		}
		sst_layer = $('<div class="wstt_layer"></div>');
		var ci = $('<div class="ci"></div>');
		ci.append($('<p>').text('课程名称：'+$(this).find('p').eq(0).text()));
		ci.append($('<p>').text('授课班级：'+$(this).find('p').eq(1).text()));
		ci.append($('<p>').text('授课时间：'+$(this).find('p').eq(3).text()+ ' '+$(this).find('p').eq(2).text()));
		ci.append($('<p>').text('授课地点：'+$(this).find('p').eq(4).text()));			
		sst_layer.append(ci);

		$('body').append(sst_layer);
		var t = $(this).offset().top - 128;
		var l = $(this).offset().left - 20;
		sst_layer.css({top:t,left:l})
		$(document).on('click',function(){
			sst_layer.remove();
		})
	})

	//tab切换
	$(document).on('click','[data-cps-role="tabnav"]',function(){
		$(this).addClass('active').siblings().removeClass('active');
		$('[data-cps-role="tabpannel"]').eq($(this).index()).show().siblings('[data-cps-role="tabpannel"]').hide();
	})

	var params = {};

	//主观题、客观题提交
	$('#test_submit_btn').click(function(){
		if($(this).hasClass('submitting'))
	    	return;
		var form = $(this).parents('form');
		var qitem = form.find('.question-item');
		var kgt_len = form.find('.question-item').find('input[type="radio"],input[type="checkbox"]').length;
		var zgt = qitem.find('textarea');
		//验证有没有答完
		var isCheck = true;
		if(kgt_len > 0){
			qitem.each(function(){
				if($(this).find('input:checked').length == 0){
					isCheck = false;
					alert('还有未做完的客观题，请完成后再提交');
					return false;
				}
			})
		}else if(zgt.length > 0){
			zgt.each(function(){
				if($.trim($(this).val()) == ''){
					isCheck = false;
					alert('还有未做完的主观题，请完成后再提交');
					return false;
				}
			})
		}
		var params = {};
		if(isCheck){
			$(this).addClass('submitting').val('提交中...');
			var questionNum = 0;
			var taskId = $('#taskId').val();
			params.taskId = taskId;
			params.textPaperId = $('#textPaperId').val();
			params.questionDetailList = [];
			qitem.each(function(i, v){
				questionNum++;
				var qd = {};
				var answer = '';
				qd.serialNumber = parseInt($(v).find('input[name="serialNumber"]').val());
				qd.questionId = parseInt($(v).find('input[name="questionId"]').val());
				if($(v).find('input:checked').length > 1){
					$(v).find('input:checked').each(function(){
						answer = answer + $(this).val();
					})
					qd.answer = answer;
				}else if($(v).find('input:checked').length == 1){
					qd.answer = $(v).find('input:checked').val();
				}else{
					qd.answer = $(v).find('textarea').val();
				}
				params.questionNum = questionNum;
				params.questionDetailList.push(qd);
			})
			var params = utils.param(params);
			$.ajax({
				type:'POST',
				url: '/api/submitTextPaper',
				dateType: 'JSON',
				data: params,
				success: function(data){
					if(data.resultCode == 0){
						window.location = '/test/complete/'+taskId; 
					}else{
						alert(data);
						window.location = '/task'
					}
				}
			})
		}
	})

	$('.ud_btn').click(function(){
		$('.dialog').show();
		$('.mask').show();
	})

	$('#fn_up_btn').click(function(){
		if($('#up_file').val() == ''){
			alert('请选择上传文件!');
			return;
		}else if($('#desc').val() == ''){
			alert('请输入描述');
			return;
		}
		var formData = new FormData();
		formData.append('taskId', $('#taskId').val());
		formData.append('fileContent', $('#desc').val());
		formData.append('file', $('#up_file')[0].files[0]);
		$.ajax({
		    url: '/api/uploadfile',
		    type: 'POST',
		    cache: false,
		    data: formData,
		    processData: false,
		    contentType: false,
		    success:function(data){
		    	if(data.resultCode != -1){
		    		alert('上传成功！');
		    	}
		    }
		})
		$('.dialog').hide();
		$('.mask').hide();
	})

	$('.close_btn').click(function(){
		$('.dialog').hide();
		$('.mask').hide();
	})

	//实训题提交
	$('#sx_submit_btn').click(function(){
		if($(this).hasClass('submitting'))
	    	return;
	    $(this).addClass('submitting').val('提交中...');
		var taskId = $('#taskId').val();
		$.ajax({
			type:'POST',
			url: '/api/submitTrainTask',
			dateType: 'JSON',
			data: { 'taskId': taskId },
			success: function(data){
				if(data.resultCode == 0){
					window.location = '/test/wpysx/'+taskId; 
				}else{
					alert(data);
					window.location = '/task'
				}
			}
		})	
	})

	//点击更换验证码
	$('.valid_img').click(function(){
		var src = $(this).attr('src');
		var ri = src.indexOf('?t=');
		if(ri != -1){
			src = src.substring(0,ri) + '?t='+ new Date().getTime(); 
		}else{
			src = src + '?t=' + new Date().getTime();
		}
		$(this).attr('src', src);
	})

	//分页
	$('#pager').pagination({
		prevContent: '',
		nextContent: '',
		pageCount: $('#pager').attr('data-pageCount'),
	    callback: function(index){
	        $.ajax({
	        	url:'/api/getTaskList',
	        	type:'GET',
	        	dateType:'JSON',
	        	data:{
	        		'taskStatus':'01', 	//任务状态
	        		'page':{
	        			'pageIndex': index, //当前页
        				'pageSize':  $('#pager').attr('data-pageSize')//当前页数量
	        		}
	        	},
	        	success:function(data){
	        		var html = tklist(data.result);
	        		$('.task-list').html(html);
	        	}
	        })
	    }
	});

	$('.outline h2').click(function(){
		$(this).siblings('.section-list').toggle();
	})
	$('.section h3').click(function(){
		$(this).next('.media').toggle();
	})
	$('.lesson .info-item-detail').click(function(){
		$(this).next().toggle();
	})

	if("undefined" != typeof videojs)
		videojs.options.flash.swf = "/static/component/videojs/video-js.swf";
	var v;
	$('.see_btn').click(function(e){
		if($(this).attr('data-ftype') == '10060002'){
			e.preventDefault();
			var o = $(this).attr('href');
	        var a = $(this).parents('.section-list').index();
	        var video = $('<video id="video' + a + '" class="video-js vjs-default-skin" controls preload="none" width="100%" height="100%"><source src="' + o + '" type="video/mp4" /></video>')
	        $("#video-player").html(video);

	        v = videojs("video" + a, {
	            controls: !0,
	            autoplay: !0,
	            preload: "auto"
	        }, function() {})
	        $('.dialog').show();
		}
	})

	$('#prev_video').click(function(){
		var o = $(this).attr('data-url');
		var video = $('<video id="video" class="video-js vjs-default-skin" controls preload="none" width="100%" height="100%"><source src="' + o + '" type="video/mp4" /></video>')
        $("#video-player").html(video);
        v = videojs("video", {
            controls: !0,
            autoplay: !0,
            preload: "auto"
        }, function() {})
        $('.dialog').show();
	})

	$('.dialog .out-close-btn').click(function(){
		$(this).parent().hide();
		v && v.dispose();
	})

	$('.update_pwd_btn').click(function(e){
		$('.dialog').show();
		$('.mask').show();
	})

	$(document).on('click','.mask',function(e){
		$('.dialog').hide();
		$('.mask').hide();
	})

	var up_pwd_validator = new Validator('changePwd_form', {
	    fields: {
	        oldpwd: {
	            rules: 'required',
	            messages: "原密码不能为空"
	        },
	        newpwd1: {
	            rules: 'required',
	            messages: "新密码不能为空"
	        },
	        newpwd2: {
	        	rules: 'required | checkpwd',
	        	messages: '确认密码不能为空 | 两次密码不一致'
	        }
	    },
	    // 参数：errorEl 错误信息节点，fieldEl 出现错误的表单节点
	    errorPlacement: function(errorEl, fieldEl) {
	    	// 错误位置
	    	$(fieldEl).parent().append(errorEl);
	    },
	    callback: function(event) {
	    	// 阻止表单提交
	    	up_pwd_validator.preventSubmit();
	    	$('.re_error').text('');
	        // 回调函数
	        var sbtn = $('#up_pwd_btn');
	        if(sbtn.hasClass('submitting'))
	        	return;
	        sbtn.addClass('submitting').val('确认中...');
			$.ajax({
				url:'/api/updatePwd',
				type: 'POST',
				dateType: 'JSON',
				data: {
					"theOldPwd": $('#oldpwd').val(), 
					"theNewPwd": $('#newpwd1').val(), 
				},
				success: function(data){
					if(data == 1){
						$('.dialog').hide();
						$('.mask').hide();
						alert('修改密码成功');
					}else{
						sbtn.removeClass('submitting').val('确认');
						$('.re_error').text(data);
					}
				}
			})
	    }
	});

	up_pwd_validator.addMethod('checkpwd', function(field) {
		if($('#newpwd1').val() != field.value){
			return false;	
		}else{
			return true;
		}
	});
})