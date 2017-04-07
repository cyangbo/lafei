<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="1元夺宝，就是指只需1元就有机会获得一件商品，是基于网易邮箱平台孵化的新项目，好玩有趣，不容错过。">
<meta name="keywords" content="1元,一元,1元夺宝,1元购,1元购物,1元云购,一元夺宝,一元购,一元购物,一元云购,夺宝奇兵">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
<title>用户登录－<?php echo S('WEB_NAME');?></title>
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/jquery-ui-1.8.21.custom.css" />
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/common.css">



<script type="text/javascript" src="/Public/Mobile/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/comm.js?v=wj5.0"></script>
<script type="text/javascript" src="/Public/Mobile/js/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/jquery.simplemodal.src.js"></script>

<!-- IE浏览器时需要以下js支持 -->

<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

	
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/login.css">

	
<script type="text/javascript">
function onLogin(){
	showDialog('登录');
	return false;
}
</script>

</head>
<body>
	<!-- 头部 -->
	

	<!-- /头部 -->
	
	<!-- 主体 -->
	
<div class="m-simpleHeader" id="dvHeader">
    <a href="javascript:history.back(-1);" data-pro="back" data-back="true" class="m-simpleHeader-back"><i class="ico ico-back"></i></a>
	
    <h1>用户登录</h1>
</div>
<div class="m-login">
	<input type="hidden" name="id" value="<?php echo I('id');?>">
    <div class="m-login-tips" id="tips"></div>
    <div class="m-login-form w-form">
        <div class="w-form-item m-login-form-account w-inputBar w-bar" id="dvAccount"><div class="w-bar-label">帐号：</div><a data-pro="clear" href="javascript:void(0);" class="w-bar-input-clear">×</a><div class="w-bar-control"><input placeholder="请输入帐号" autocapitalize="off" data-pro="input" class="w-bar-input" name="username" type="text"></div></div>
        <div class="w-form-item m-login-form-password w-inputBar w-bar" id="dvPassword"><div class="w-bar-label">密码：</div><a data-pro="clear" href="javascript:void(0);" class="w-bar-input-clear">×</a><div class="w-bar-control"><input placeholder="请输入密码" autocapitalize="off" data-pro="input" class="w-bar-input" name="password" value="" type="password"></div></div>
        <div class="m-login-menu" id="autoCmpl" style="display:none;"></div>
    </div>
    <div class="m-login-tips-bottom" id="tipsBottom"></div>
    <div class="m-login-submit"><button class="w-button w-button-main"  data-action="<?php echo U('user/login');?>" id="btnLogin" onclick="postdata()">登 录</button></div>
	
    <div class="m-login-link">
        <a href="#"></a>
        <a href="<?php echo U('user/register');?>" id="aForget" class="aside" style="display:none">没有账号？</a>
    </div>
    <div class="m-login-extLogin" style="display:none">
        <div class="hd"><span>第三方登录</span></div>
        <div class="bd">
            <div class="m-login-extLogin-item">
                <a class="ico ico-thirdLogin ico-thirdLogin-qq" href="http://reg.163.com/outerLogin/oauth2/connect.do?target=1&amp;product=mail_one&amp;url=http://m.1.163.com/&amp;url2=http://m.1.163.com/"></a>
                <p>QQ</p>
            </div>
            <div class="m-login-extLogin-item">
                <a class="ico ico-thirdLogin ico-thirdLogin-weibo" href="http://reg.163.com/outerLogin/oauth2/connect.do?target=3&amp;product=mail_one&amp;url=http://m.1.163.com/&amp;url2=http://m.1.163.com/"></a>
                <p>新浪微博</p>
            </div>
        </div>
    </div>
</div>


	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	<div id="wanjinDialog"></div>
</body>
</html>