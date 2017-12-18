$(function () {
	//tab切换
	$(document).on('click', '[data-cps-role="tabnav"]', function () {
		$(this).addClass('active').siblings().removeClass('active');
		$('[data-cps-role="tabpannel"]').eq($(this).index()).show().siblings('[data-cps-role="tabpannel"]').hide();
	})
})
//登录状态
$(function () {
	var username = localStorage.getItem('username');
	if (username) { //判断是否登录==登陆
		$(".login_btn").hide();
		$(".user_name").show().html(username);
		$(".logout_btn").show();
	} else {
		$(".login_btn").show();
		$(".user_name").hide().html('');
		$('.logout_btn').hide();
	}
	//退出登录
	$(".logout_btn").click(function () {
		$(".login_btn").show();
		$(".user_name").hide().html('');
		$(this).hide();
		localStorage.setItem("username", '')
		window.location.reload();
	})
})

//设置遮罩样式
function maskShow() {
	$('.mask').css({
		height: document.documentElement.clientHeight
	}).show();
	$("html").css({
		overflow: 'hidden'
	})
}

function maskHide() {
	$('.mask').css({
		height: 0
	}).hide();
	$("html").css({
		overflow: 'auto'
	})
}

//获取当前时间
function getNowFormatDate() {
	var date = new Date();
	var seperator1 = "-";
	var seperator2 = ":";
	var month = date.getMonth() + 1;
	var strDate = date.getDate();
	if (month >= 1 && month <= 9) {
		month = "0" + month;
	}
	if (strDate >= 0 && strDate <= 9) {
		strDate = "0" + strDate;
	}
	var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate +
		" " + date.getHours() + seperator2 + date.getMinutes() +
		seperator2 + date.getSeconds();
	return currentdate;
}

//获取地址栏参数
function GetQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
	var r = window.location.search.substr(1).match(reg);
	if (r != null) return unescape(r[2]);
	return null;
}

//去除重复数据
function outRepeat(a) {
	var hash = [],
		arr = [];
	for (var i = 0; i < a.length; i++) {
		hash[a[i]] != null;
		if (!hash[a[i]]) {
			arr.push(a[i]);
			hash[a[i]] = true;
		}
	}
	return arr;
}

//弹框
function alert(text, type, fn) {
	if (fn) {
		var option = {
			title: "提示",
			btn: parseInt("0011", 2),
			onOk: function () {
				fn();
				console.log('aa')
			}
		}
		window.wxc.xcConfirm(text, "custom", option);
	} else {
		if (!type) {
			window.wxc.xcConfirm(text, window.wxc.xcConfirm.typeEnum.info);
		} else if (type == 'success') {
			window.wxc.xcConfirm(text, window.wxc.xcConfirm.typeEnum.success);
		} else if (type == "error") {
			window.wxc.xcConfirm(text, window.wxc.xcConfirm.typeEnum.error);
		} else if (type == "warning") {
			window.wxc.xcConfirm(text, window.wxc.xcConfirm.typeEnum.warning);
		}
	}
}