<?php if (!defined('THINK_PATH')) exit(); if(!$bet) throw new Exception('单号不存在'); $modeName=array('2.00'=>'元', '0.20'=>'角', '0.02'=>'分'); $weiShu=$bet['weiShu']; if($weiShu){ $w=array(16=>'万', 8=>'千', 4=>'百', 2=>'十',1=>'个'); foreach($w as $p=>$v){ if($weiShu & $p) $wei.=$v; } $wei.=':'; } $betCont=$bet['mode'] * $bet['beiShu'] * $bet['actionNum'] * ($bet['fpEnable']+1); ?>

<table class="hisinfo" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
	<td width="40%">
		<strong>方案：</strong><?=$bet['wjorderId']?>
	</td>
	<td width="30%">
		<strong>彩种：</strong><?=$types[$bet['type']]['title']?>
	</td>
	<td width="30%">
		<strong>会员名：</strong><?=$this->iff($bet['username']==$user['username'], $bet['username'], preg_replace('/^(\w).*(\w{2})$/', '\1***\2', $bet['username']))?>
	</td>
</tr>
<tr>
	<td>
		<strong>期号：</strong><?=$bet['actionNo']?>
	</td>
	<td>
		<strong>返水：</strong><?=$this->iff($bet['lotteryNo'], number_format(($bet['fanDian']/100)*$betCont, 4). '元', '－')?>
	</td>
	<td>
		<strong>倍数模式：</strong><?=$bet['beiShu']?>倍，<?=$modeName[$bet['mode']]?>模式
	</td>
</tr>
<tr>
	<td>
		<strong>时间：</strong><?=date('Y/m/d H:i:s',$bet['actionTime'])?>
	</td>
	<td>
		<strong>投注注数：</strong><?=$bet['actionNum']?>
	</td>
	<td>
		<strong>投注金额：</strong><?=number_format($betCont, 2)?>
	</td>
</tr>
<tr>
	<td>
		<strong>下注奖金返点：</strong><?=number_format($bet['bonusProp'], 2)?>－<?=number_format($bet['fanDian'],1)?>%
	</td>
	<td>
		<strong>奖金：</strong><?=$this->iff($bet['lotteryNo'], $bet['bonus'].'元', '---')?>
	</td>
	<td>
		<strong>状态：</strong><?php
 if($bet['isDelete']==1){ echo '<font color="#999999">已撤单</font>'; }elseif(!$bet['lotteryNo']){ echo '<font color="#009900">未开奖</font>'; }elseif($bet['zjCount']){ echo '<font color="red">已派奖</font>'; }else{ echo '<font color="#00CC00">未中奖</font>'; } ?>
	</td>
</tr>
<tr>
	<td colspan="3">
		<strong>开奖号码：</strong><?=$this->ifs($bet['lotteryNo'], '---')?>
	</td>
</tr>
<tr class="nobd">
	<td colspan="3" style="height:50px;">
		<strong>投注内容：</strong><textarea class="t1" readonly="TRUE" style="width:790px;margin-bottom:5px;height:150px;"><?=$wei.$bet['actionData']?></textarea>
	</td>
</tr>
<?php if(!$bet['lotteryNo'] && $bet['uid']==$user['uid']){ ?>
<tr class="nobd">
	<td colspan="4" style="height:50px;">
		<input value="&nbsp;撤&nbsp;单&nbsp;" class="button yh" id="cancelproject" type="button">
	</td>
</tr>
<?php } ?>
</tbody>
</table>