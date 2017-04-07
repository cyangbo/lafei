<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="1元夺宝，就是指只需1元就有机会获得一件商品，是基于网易邮箱平台孵化的新项目，好玩有趣，不容错过。">
<meta name="keywords" content="1元,一元,1元夺宝,1元购,1元购物,1元云购,一元夺宝,一元购,一元购物,一元云购,夺宝奇兵">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
<title>购彩大厅－<?php echo S('WEB_NAME');?></title>
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/jquery-ui-1.8.21.custom.css" />
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/common.css">



<script type="text/javascript" src="/Public/Mobile/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/comm.js?v=wj5.0"></script>
<script type="text/javascript" src="/Public/Mobile/js/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/jquery.simplemodal.src.js"></script>

<!-- IE浏览器时需要以下js支持 -->

<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

	
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/user.css">

	
<script type="text/javascript">
var lid=0;
$(function(){
	//开奖倒计时
	setTimeout(gameKanJiangDataC, 1000, <?=$diffTime?>);
	<?php  if(!$kjHao){ ?>
		loadKjData();
	<?php } ?> 
});

function showGroup(){
	$('#played').css({visibility:'hidden'});
	$('#group').css({visibility:'visible'});
	$('#full-screen').css({display:'block'});
}

function showPlayed(){
	$('#group').css({visibility:'hidden'});
	$('#played').css({visibility:'visible'});
	$('#full-screen').css({display:'block'});
}

function hideGroup(){
	$('#group').css({visibility:'hidden'});
	$('#played').css({visibility:'hidden'});
	$('#full-screen').css({display:'none'});	
}

var game={
	type:<?=json_encode($type)?>,
	played:<?=json_encode($played)?>,
	groupId:<?=json_encode($groupId)?>
},
user="<?=$_SESSION['user']['username']?>",
aflag=<?=json_encode($$_SESSION['user']['admin']==1)?>;

</script>
<script type="text/javascript" src="/Public/Mobile/js/game.js?v=g5.0"></script>
<script type="text/javascript" src="/Public/Mobile/js/function.js?v=f5.0"></script>

</head>
<body>
	<!-- 头部 -->
	

	<!-- /头部 -->
	
	<!-- 主体 -->
	
<div class="m-user">
	<div class="m-simpleHeader" id="dvHeader">
		<a href="javascript:history.go(-1);" data-pro="back" data-back="true" class="m-simpleHeader-back"><i class="ico ico-back"></i></a>
		<a href="<?php echo U('index/index');?>" data-pro="ok" class="m-simpleHeader-ok" id="aHome"><i class="ico ico-home"></i></a>
		<h1><?php echo ($types[$type]['title']); ?></h1>
	</div>
	<div class="m-user-duobaoRecord" id="duobaoRcd_dvWrapper" style="bottom:150px;margin-bottom:150px;">		
		<div>
			<div style="height:120px;background:rgb(255, 244, 223);">
				<div style="padding-left:80px;padding-top:10px;">第<span id="actionNo"><?php echo ($actionNo['actionNo']); ?></span>期 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('game/history?type='.$type);?>" style="display: inline-block;padding:3px 3px;border: 1px solid #ddd;border-radius:5px;color:#000;background-color:#ddd">历史开奖</a></div>
				<div style="margin:0 auto;width:300px;height:37px;padding-top:5px;">
					<ul class="kjhao">
						<li><?php echo $this->iff($kjHao[0]!='',$kjHao[0],'?');?></li>
						<li><?php echo $this->iff($kjHao[1]!='',$kjHao[1],'?');?></li>
						<li><?php echo $this->iff($kjHao[2]!='',$kjHao[2],'?');?></li>
						<li><?php echo $this->iff($kjHao[3]!='',$kjHao[3],'?');?></li>
						<li><?php echo $this->iff($kjHao[4]!='',$kjHao[4],'?');?></li>
					</ul>
				</div>
				<div style="margin:0 auto;width:100px;height:30px;font-weight:bold;font-size:25px;">
					<span id="time">00:00:00</span>
				</div>
			</div>
			
			<div data-pro="more">
				
			</div>
		</div>
		<div style="margin-top:5px;background:#bbb;">
			<div style="margin-left:15%;float:left;height:30px;">
				<?php $groups2 = array(); $i=0; foreach($groups as $group) { if($group['type']==$types[$type]['type']) { $groups2[$i] = $group; $i++; } } ?>
				<a style="color:#fff;font-size:18px;" href="javascript: void(0)" id="groupMenu" onclick="showGroup()"><?php echo ($groups2[0]['groupName']); ?>▽</a>
				<div style="position:absolute;z-index:25;background-color:#fff;visibility:hidden" id="group" onclick="hideGroup()">
					<ul>
						<?php if($groups2) foreach($groups2 as $key=>$group){ ?>
							<li style="border-bottom: 1.5px solid #CCC;border-bottom-width: 1.5px;border-bottom-style: solid;border-bottom-color: rgb(204, 204, 204);font-size:18px">
								<a href="#" style="color:#000;padding:5px 5px" data="<?php echo U('game/group?type='.$type.'&groupId='.$group['id']);?>" onclick="selectGroup(this)"><?php echo ($group['groupName']); ?></a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<span id="played-span">
				<div style="margin-right:10%;float:right;">
	<?php $playeds2 = array(); $i=0; foreach($playeds as $play) { if($play['groupId']==$groupId && $play['enable']==1) { $playeds2[$i] = $play; $i++; } } if(!$playedId) $playedId=$playeds2[0]['id']; ?>
	<a style="color:#fff;font-size:18px;" href="javascript: void(0)" id="playedMenu" onclick="showPlayed()"><?php echo ($playeds2[0]['name']); ?>▽</a>
	<div style="position:absolute;z-index:25;background-color:#fff;visibility:hidden" id="played" onclick="hideGroup()">
		<ul>
			<?php if($playeds2) foreach($playeds2 as $key=>$played){ if($playedId==$played['id']){ $tpl=$played['playedTpl']; $simpleInfo=$played['simpleInfo']; } ?>
				<li style="border-bottom: 1.5px solid #CCC;border-bottom-width: 1.5px;border-bottom-style: solid;border-bottom-color: rgb(204, 204, 204);font-size:18px">
					<a href="#" data="<?php echo U('game/played?type='.$type.'&playedId='.$played['id']);?>" data-id="<?php echo ($played['id']); ?>" onclick="selectPlayed(this)" style="color:#000;padding:5px 5px"><?php echo ($played['name']); ?></a>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
<br>
<span id="played-content">
	<div id="game-helptips" style="background:#eee">
	<div class="showhelp">
		<h6 id="lt_desc">说明：<?=$simpleInfo?></h6>    
		<div class="clear"></div>
	</div>
</div>
<div style="background-color:rgb(255, 244, 223);overflow:hidden;min-height:270px" id="num-select">
	<?php  if(!$played['enable']) { echo '<div style="height:100px;text-align:center;color:#f00">暂无玩法</div>'; return; } require MODULE_PATH.'View/default/Game/game-played/'.$tpl.'.html'; ?>
</div>
</span>
			</span>
		</div>
	</div>
	<div id="fixedBottom" class="container-fluid">
			<div class="row">
				<div class="col-md-8" style="padding-right: 0;">
					<div>
						<strong id="count-amount">已选择了<font id="count">0</font>注,共￥<font id="amount">0.00</font>元</strong>
					</div>
					<div class="multipleText" style="margin-top: 10px; white-space: nowrap;">
						<strong>
							倍数:<input type="number" id="beishu" style="padding: 0 5px; width: 80px;" data-bind="value: lotteryTimes, valueUpdate: 'input', event:{ keyup: checkTimesNumeric }" value="1">倍
							<select id="unit" data-bind="value: priceUnit, event:{ change: unitChange }">
								<?php if($settings['yuan_mode']) echo '<option value="2">2元</option>'; ?>
								<?php if($settings['jiao_mode']) echo '<option value="0.2">2角</option>'; ?>
								<?php if($settings['fen_mode']) echo '<option value="0.02">2分</option>'; ?>										
								<?php if($settings['li_mode']) echo '<option value="0.002">2厘</option>'; ?>
							</select>
						</strong>
					</div>
				</div>
				<div class="col-md-4" style="padding-left: 10px;">
					<div><b>一倍奖金</b></div>
					<div style="margin-top: 10px;">
						<b>
							<span style="display:none" id="slider" class="slider" value="0" data-bet-count="<?=$settings['betMaxCount']?>" data-bet-zj-amount="<?=$settings['betMaxZjAmount']?>" max="<?=$_SESSION['user']['fanDian']?>" maxfd="<?=$settings['fanDianMax']?>" fan-dian="<?=$user['fanDian']?>" game-fan-dian-bdw="<?=$settings['fanDianBdwMax']?>" fan-dian-bdw="<?=$user['fanDianBdw']?>" min="0">0</span>
							<select style="width: 100px" data-bind="value: priceUnit, event:{ change: unitChange }" name="lt_sel_dyprize" id="lt_sel_dyprize" data-bet-count="<?=$settings['betMaxCount']?>" data-bet-zj-amount="<?=$settings['betMaxZjAmount']?>" max="<?=$_SESSION['user']['fanDian']?>" maxfd="<?=$settings['fanDianMax']?>" fan-dian="<?=$user['fanDian']?>" game-fan-dian-bdw="<?=$settings['fanDianBdwMax']?>" fan-dian-bdw="<?=$user['fanDianBdw']?>" min="0">
							</select>
							
						</b>
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>
			<div class="BetBtns" style="margin-top: 10px;">			
				<!--投注按鈕-->
				<div id="mobile-bet-schedule-button" class="zhuihao" onclick="winjinAlert('暂无此功能','alert')">我要追号</div>
				<div id="bet-confirm-mobile" class="postcode" >确定投注</div>
			</div>
		</div>
</div>
<div id="full-screen" onclick="hideGroup()"></div>

	<!-- /主体 -->

	<!-- 底部 -->
	
	<!-- /底部 -->
	<div id="wanjinDialog"></div>
</body>
</html>