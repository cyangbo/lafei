<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="1元夺宝，就是指只需1元就有机会获得一件商品，是基于网易邮箱平台孵化的新项目，好玩有趣，不容错过。">
<meta name="keywords" content="1元,一元,1元夺宝,1元购,1元购物,1元云购,一元夺宝,一元购,一元购物,一元云购,夺宝奇兵">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
<title>历史开奖－<?php echo S('WEB_NAME');?></title>
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/jquery-ui-1.8.21.custom.css" />
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/common.css">



<script type="text/javascript" src="/Public/Mobile/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/comm.js?v=wj5.0"></script>
<script type="text/javascript" src="/Public/Mobile/js/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/jquery.simplemodal.src.js"></script>

<!-- IE浏览器时需要以下js支持 -->

<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

	
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/detail.css">
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/user.css">

	
<script type="text/javascript">
var lid=0;
$(function(){
	var type = "<?php echo I('type');?>";
	var url = "<?php echo U('game/gethistory');?>";
	
	scrollUpdate(url,type,0,'.m-winRecord-list');
});
</script>

</head>
<body>
	<!-- 头部 -->
	

	<!-- /头部 -->
	
	<!-- 主体 -->
	
<div class="g-body">
	<div class="m-winRecord">
		<div class="m-simpleHeader" id="dvHeader">
			<a href="javascript:history.back(-1);" data-pro="back" data-back="true" class="m-simpleHeader-back"><i class="ico-back"></i></a>
			<h1>历史开奖</h1>
		</div>
		<div class="g-wrap">
			<div class="m-winRecord-wrap">
				<div style="display: none;" afmoldstyle="block" class="w-loading">
					<img style="display:inline;vertical-align:middle" src="http://mimg.127.net/p/yymobile/lib/img/common/loading.gif" height="20" width="20"> 正在努力加载中……
				</div>
				<div id="pro-view-1">
					<ul class="m-winRecord-list hahah" data-pro="entry">						
						<?php if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="pro-view-13" class="w-record m-winRecord-revealed">
						<div class="w-goods w-goods-l w-goods-ing m-user-goods">
							<div class="w-goods-info">
								<p>
									第 <?php echo ($vo["number"]); ?> 期 
								</p>
								<p>
									<ul class="kjhao">
									<?php $kjHao=explode(',', $vo['data']); foreach($kjHao as $var){ ?>
											<li><?php echo ($var); ?></li>									
									<?php } ?>
									</ul>
								</p>
							</div>
						</div>
						<script>lid="<?php echo ($vo['id']); ?>";</script>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<div data-pro="more">
						<div id="pro-view-15" class="w-more">
							<div data-pro="link">
								<a href="javascript:void(0);">上拉加载更多</a>
							</div>
							<div data-pro="loading" style="display:none">
								<b class="ico ico-loading"></b> 努力加载中
							</div>
							<div data-pro="disable" style="display:none">
								已经没有更多
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<button id="pro-view-0" class="w-button w-button-round w-button-backToTop" style="bottom: 55px; display: none;">返回顶部</button>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	<div id="wanjinDialog"></div>
</body>
</html>