<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="1元夺宝，就是指只需1元就有机会获得一件商品，是基于网易邮箱平台孵化的新项目，好玩有趣，不容错过。">
<meta name="keywords" content="1元,一元,1元夺宝,1元购,1元购物,1元云购,一元夺宝,一元购,一元购物,一元云购,夺宝奇兵">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
<title>首页－<?php echo S('WEB_NAME');?></title>
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/jquery-ui-1.8.21.custom.css" />
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/common.css">



<script type="text/javascript" src="/Public/Mobile/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/comm.js?v=wj5.0"></script>
<script type="text/javascript" src="/Public/Mobile/js/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/jquery.simplemodal.src.js"></script>

<!-- IE浏览器时需要以下js支持 -->

<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

	
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/index.css">

	
<script type="text/javascript" src="/Public/Mobile/js/jquery.fly.min.js"></script>
<script src="/Public/Mobile/js/requestAnimationFrame.js"></script>

</head>
<body>
	<!-- 头部 -->
	
<div class="g-header">
	<div class="m-header">
		<div class="g-wrap">
			<h1 class="m-header-logo"><?php echo S('WEB_NAME');?><a class="m-header-logo-link" href="javascript:void(0);"></a></h1>
			<div class="m-header-toolbar">
				<a class="m-header-toolbar-btn searchBtn" style="display:none" href="<?php echo U('index/toSearch');?>" target="_self" title="搜索"><i class="ico ico-search"></i></a>
				<?php if(session('user_auth_sign2')!=''){ ?>
				<a class="m-header-toolbar-btn userpageBtn" href="<?php echo U('user/info');?>" title="我的夺宝"><i class="ico ico-userpage"></i></a>
				<?php } else{ ?>
				<a class="m-header-toolbar-btn userpageBtn" href="<?php echo U('user/login');?>" title="我的夺宝"><i class="ico ico-userpage"></i></a>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- 导航栏 -->
	<div class="m-nav">
		<div class="g-wrap">
			<ul class="m-nav-list">
				<li class="selected"><a href="<?php echo U('index/index');?>"><span>首页<span></span></span></a></li>
				
				<?php if(session('user_auth_sign2')!=''){ ?><li><a href="<?php echo U('user/info');?>"><span>个人中心<span></span></span></a></li><?php } ?>
				<?php if(session('user_auth_sign2')!=''){ ?><li><a href="<?php echo U('team/index');?>"><span>管理中心<span></span></span></a></li><?php } ?>
			</ul>
		</div>
	</div>
</div>


	<!-- /头部 -->
	
	<!-- 主体 -->
	
<div class="g-body">
	<div class="m-index">
		<div class="g-body-hd">
			<div id="pro-view-2" class="w-slide m-index-promot">
				<div class="w-slide-wrap" style="width:100%">
					<ul>
						<li data-pro="item" class="w-slide-wrap-list-item" style="background-color: rgb(255, 255, 255); width: 320px;">
						<a class="frame" href="<?php echo U('index/index');?>" title=""><img src="/Public/Mobile/images/h1.jpg"></a>
						</li>
						<!--<li data-pro="item" class="w-slide-wrap-list-item selected" style="background-color: rgb(255, 255, 255); width: 320px;">
						<a class="frame" href="<?php echo U('index/index');?>" title=""><img src="/Public/Mobile/images/h2.jpg"></a>
						</li>
						<li data-pro="item" class="w-slide-wrap-list-item" style="background-color: rgb(255, 255, 255); width: 320px;">
						<a class="frame" href="<?php echo U('index/index');?>" title=""><img src="/Public/Mobile/images/h3.jpg"></a>
						</li>
						<li data-pro="item" class="w-slide-wrap-list-item" style="background-color: rgb(255, 255, 255); width: 320px;">
						<a class="frame" href="<?php echo U('index/index');?>" title=""><img src="/Public/Mobile/images/h4.jpg"></a>
						</li>
						<li data-pro="item" class="w-slide-wrap-list-item" style="background-color: rgb(255, 255, 255); width: 320px;">
						<a class="frame" href="<?php echo U('index/index');?>" title=""><img src="/Public/Mobile/images/h5.jpg"></a>
						</li>-->
						<li data-pro="item" class="w-slide-wrap-list-item" style="background-color: rgb(255, 255, 255); width: 320px;">
						<a class="frame" href="<?php echo U('index/index');?>" title=""><img src="/Public/Mobile/images/h6.jpg"></a>
						</li>
					</ul>
				</div>
				<script type="text/javascript" src="/Public/Mobile/js/yxMobileSlider.js"></script>
				<script>
					$(".w-slide-wrap").yxMobileSlider({width:320,height:120,during:3000})
				</script>
				<div class="w-slide-controller">
					
				</div>
			</div>
		</div>
		<div class="g-wrap g-body-bd">
			<a href="<?php echo U('game/game?type=1&groupId=1');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c1.png"></img></span>
				<span style="margin-left:10px">重庆时时彩</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
			<a href="<?php echo U('game/game?type=3&groupId=1');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c1.png"></img></span>
				<span style="margin-left:10px">天津时时彩</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
			<a href="<?php echo U('game/game?type=12&groupId=1');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c1.png"></img></span>
				<span style="margin-left:10px">新疆时时彩</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
			<a href="<?php echo U('game/game?type=14&groupId=1');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c1.png"></img></span>
				<span style="margin-left:10px">五分时时彩</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
			<a href="<?php echo U('game/game?type=34&groupId=1');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c1.png"></img></span>
				<span style="margin-left:10px">二分时时彩</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
			<a href="<?php echo U('game/game?type=35&groupId=1');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c1.png"></img></span>
				<span style="margin-left:10px">韩国1.5分彩</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
			<a href="<?php echo U('game/game?type=9&groupId=12');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c5.png"></img></span>
				<span style="margin-left:10px">福彩3D</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
			<a href="<?php echo U('game/game?type=10&groupId=12');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c6.png"></img></span>
				<span style="margin-left:10px">排列三</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
			<a href="<?php echo U('game/game?type=6&groupId=9');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c4.png"></img></span>
				<span style="margin-left:10px">广东11选5</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
			<a href="<?php echo U('game/game?type=15&groupId=9');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c4.png"></img></span>
				<span style="margin-left:10px">重庆11选5</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
			<a href="<?php echo U('game/game?type=16&groupId=9');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c4.png"></img></span>
				<span style="margin-left:10px">江西11选5</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
						<a href="<?php echo U('game/game?type=20&groupId=26');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c8.png"></img></span>
				<span style="margin-left:10px">北京PK10</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
									<a href="<?php echo U('game/game?type=24&groupId=38');?>" class="w-bar2">
				<span style="float:left"><img src="/Public/Mobile/images/lottery/c2.png"></img></span>
				<span style="margin-left:10px">北京快乐8</span>
				<span class="w-bar-ext2"><b class="ico-next"></b></span>
			</a>
		</div>
	</div>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	
<div class="g-footer">
	<div class="g-wrap">
		
		<ul class="m-state f-clear">
			<li><i class="ico ico-state ico-state-1"></i>公平公正公开</li>
			<li><i class="ico ico-state ico-state-2"></i>正品保证</li>
			<li class="last"><i class="ico ico-state ico-state-3"></i>权益保障</li>
		</ul>
		
		<p class="m-copyright">
			ICP证浙B2-20140185 <span><?php echo S('WEB_NAME');?> © 2014-2016</span>
		</p>
	</div>
</div>
<?php $count = count(session('cart')); ?>
<button id="pro-view-0" class="w-button w-button-round w-button-backToTop" style="display:none">返回顶部</button>

	<!-- /底部 -->
	<div id="wanjinDialog"></div>
</body>
</html>