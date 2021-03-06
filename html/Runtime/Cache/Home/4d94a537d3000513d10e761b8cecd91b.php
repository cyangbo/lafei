<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>用户注册</title>
<link rel="stylesheet" href="/Public/Home/css/login.css">
<link rel="stylesheet" href="login_files/font-awesome.css">
<style type="text/css">
        /*扫描二维码界面开始*/
.masksao
{
	position:fixed;
	left:0;
	top:0;
	width:100%;
	height:100%;
	background-color:rgba(0,0,0,.8);
	z-index:99999;
	display:none
}
.sao
{
	position:absolute;
	left:45%;
	top:50%;
	width:360px;
	margin-left:-100px;
	margin-top:-100px;
	height:285px;
	background-color:#fff;
	text-align:center;
	box-sizing:border-box;
	padding-top:20px;
}
.sao p
{
	padding-top:10px;
}
.sao span {
	display: table-cell;
	text-align: center;
}
</style>
<link href="login_files/mibaoka.css" rel="stylesheet">
<script type="text/javascript" src="/Public/Home/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
	$(function(){
		validBrowser();
		var verifyimg = $(".verifyimg").attr("src");
		$(".reloadverify").click(function(){
			if( verifyimg.indexOf('?')>0){
				$(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
			}else{
				$(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
			}
		});
		
		$("form").submit(function(){
			var self = $(this);
			$.post(self.attr("action"), self.serialize(), success, "json");
			return false;

			function success(data){
				if(data.status){
					
					window.location.href = data.url;
					alert(data.info);
				} else {
					$(".reloadverify").click();
					alert(data.info);				
				}
			}
		});
		$("#j-app-btn").bind("click",
          function toggle() {
              $(".masksao").show();
          }
        );
        $(".masksao").bind("click",
          function toggle() {
              $(".masksao").hide();
          }
        );
	});
	
	function validBrowser() {
	  var u_agent = navigator.userAgent;
	  var browser_name = 'unKnow browser';
	  if (u_agent.indexOf('Firefox') > - 1) {
		browser_name = 'Firefox'
	  } else {
		if (u_agent.indexOf('Chrome') > - 1) {
		  browser_name = 'Chrome'
		} else {
		  if (u_agent.indexOf('Trident') > - 1 && u_agent.indexOf('rv:11') > - 1) {
			browser_name = 'IE11'
		  } else {
			if (u_agent.indexOf('MSIE') > - 1 && u_agent.indexOf('Trident') > - 1) {
			  browser_name = 'IE(8-10)'
			} else {
			  if (u_agent.indexOf('MSIE') > - 1) {
				browser_name = 'IE(6-7)'
			  } else {
				if (u_agent.indexOf('Opera') > - 1) {
				  browser_name = 'Opera'
				}
			  }
			}
		  }
		}
	  }
	  if (browser_name != 'IE11' && browser_name != 'Chrome') {
		alert('亲~~，强烈推荐您点击下载、使用页面下方的最新浏览器，否则可能没有更好的体验效果');
	  }
	}
	
</script>
</head>
<body>
<?php  $linkData = M('links')->where(array('lid'=>I('lid'), 'uid'=>I('uid')))->find(); if(!$linkData) { echo '<script>alert("链接失效！")</script>'; exit();} ?>
<div class="masksao">
	<div class="sao">
		<span><img alt="" src="/Public/Home/images/vcode1.png" /><br>安卓版</span>
		<span><img alt="" src="/Public/Home/images/vcode2.png"><br>苹果版</span>
		<p>
			通用版：<a href="http://t.cn/RqnsL88" style="color:blue" target="_blank">http://t.cn/RqnsL88</a>
		</p>
		<p>
			(微信内置扫一扫无法直接下载时，可使用qq扫一扫)
		</p>
	</div>	
</div>
<div class="loginbox1">

	<div class="loginform">
		<div class="loginformbox">
			<form method="post" id="login" action="<?php echo U('user/register');?>" enter="true">
				<input type="hidden" name="regPath" value="<?='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>">
				<div class="loginformboxtitle">
					 用 户 注 册
				</div>
				<input type="hidden" name="lid" value="<?php echo I('lid');?>"  />
				<input type="hidden" name="uid" value="<?php echo I('uid');?>"  />
				<div class="loginformboxcontent">
					<p>
						<i class="fa fa-user"></i>
						<input style="ime-mode:disabled;" autocomplete="off" placeholder="请输入用户名" maxlength="50" id="username" name="username" type="text">
					</p>
					<p>
						<i class="fa fa-asterisk"></i>
						<input style="ime-mode:disabled;" maxlength="40" autocomplete="off" placeholder="请输入密码" id="password" name="password" type="password">
					</p>
					<p>
						<i class="fa fa-asterisk"></i>
						<input style="ime-mode:disabled;" maxlength="4" autocomplete="off" placeholder="请输入验证码" id="verify" name="verify" type="text">
						<img id="ReCaptcha_CodeImage" class="verifyimg reloadverify" style="cursor: pointer;height:43px; width:90px;" src="<?php echo U('verify');?>" alt="点击切换">
					</p>
					
					<div>
						<input value="注 册" type="submit" style="cursor:pointer">
					</div>
					<br>
					<a href="<?php echo U('user/login');?>" target="_blank">我已有账户，返回登录？</a>
					<br>
					
				</div>
			</form>
			
		</div>
	</div>
</div>
<div class="loginfoot">
	<div class="loginfootbox">
		<div class="loginfootboxleft" id="walkthrough-1">
			<div>
				浏览器下载
			</div>
			<p>
				<a href="http://dlsw.baidu.com/sw-search-sp/soft/9d/14744/ChromeStandalone_47.0.2526.80_Setup.1449716976.exe" target="_blank">
				<span class="bg1"><i class="fa fa-chrome"></i></span><strong>谷歌浏览器<em>版本：47.0</em></strong>
				</a>
				<a href="http://down.360safe.com/cse/360cse_8.5.0.128.exe" target="_blank">
				<span class="bg3"><i class="fa fa-360"></i></span><strong>360极速浏览器<em>版本：8.5</em></strong>
				</a>
				<a href="http://download.microsoft.com/download/F/2/8/F2871AC4-E82B-4636-BB37-A5F2B14C8616/IE11-Windows6.1-x86-zh-cn.exe" target="_blank">
				<span class="bg2"><i class="fa fa-internet-explorer"></i></span><strong>IE  浏览器<em>版本：11.0</em></strong>
				</a>
			</p>
		</div>
		<div class="loginfootboxright">
			<div>
				客户端下载
			</div>
			<p>
				<a href="javascript:void(0);">
				<span class="bg4"><i class="fa fa-desktop"></i></span><strong>PC客户端<em>版本：1.0</em></strong>
				</a>
				<a href="javascript:;" id="j-app-btn">
				<span class="bg5"><i class="fa fa-mobile" style="font-size:30px"></i></span><strong>手机客户端<em>版本：1.0</em></strong>
				</a>
			</p>
		</div>
	</div>
</div>

</body>
</html>