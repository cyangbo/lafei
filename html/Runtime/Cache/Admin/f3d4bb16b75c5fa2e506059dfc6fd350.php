<?php if (!defined('THINK_PATH')) exit();?>
<?php
 $modeName=array('2.00'=>'元', '0.20'=>'角', '0.02'=>'分'); $weiShu=$bet['weiShu']; if($weiShu){ $w=array(16=>'万', 8=>'千', 4=>'百', 2=>'十',1=>'个'); foreach($w as $p=>$v){ if($weiShu & $p) $wei.=$v; } $wei.=':'; } $betCont=$bet['mode'] * $bet['beiShu'] * $bet['actionNum'] * ($bet['fpEnable']+1); ?>
<div>
<form action="/admin.php?s=/admin/business/updatebet/id/302.html" target="ajax" method="post">
	<input type="hidden" name="id" value="<?=$bet['id']?>"/>
	<input type="hidden" name="wjorderId" value="<?=$bet['wjorderId']?>"/>
	<input type="hidden" name="mode" value="<?=$bet['mode']?>"/>
	<input type="hidden" name="beiShu" value="<?=$bet['beiShu']?>"/>
	<input type="hidden" name="actionNum" value="<?=$bet['actionNum']?>"/>
	<input type="hidden" name="beiShu" value="<?=$bet['beiShu']?>"/>
    <input type="hidden" name="uid" value="<?=$bet['uid']?>"/>
    <input type="hidden" name="username" value="<?=$bet['username']?>"/>
   
<div class="bet-info popupModal">
	<table cellpadding="1" cellspacing="1" width="480">
		<tr>
			<td align="right">号码：</td>
			<td colspan="3"><?php echo ($wei); ?><textarea cols="45" name="actionData" rows="5"><?=$bet['actionData']?></textarea></td>
		</tr>
		<tr>
			<td width="80" align="right">单号：</td>
			<td width="160"><?=$bet['wjorderId']?></td>
			<td width="80" align="right">投注数量：</td>
			<td width="160"><?=$bet['actionNum']?></td>
		</tr>
		<tr>
			<td align="right">发起人：</td>
			<td><?=$bet['username']?></td>
			<td align="right">模式：</td>
			<td><?=$modeName[$bet['mode']]?></td>
		</tr>
		<tr>
			<td align="right">倍数：</td>
			<td><?=$bet['beiShu']?></td>
			<td align="right">中奖注数：</td>
			<td><?=$this->iff($bet['lotteryNo'], $bet['zjCount'], '－')?></td>
		</tr>
		<tr>
			<td align="right">彩种：</td>
			<td><?=$types[$bet['type']]['title']?></td>
			<td align="right">奖金－返点：</td>
			<td><?=number_format($bet['bonusProp'], 2)?>－<?=number_format($bet['fanDian'],1)?>%</td>
		</tr>
		<tr>
			<td align="right">期号：</td>
			<td><?=$bet['actionNo']?></td>
			<td align="right">玩法：</td>
			<td><?php echo ($playeds[$bet['playedId']]['name']); ?></td>
		</tr>
		<tr>
			<td align="right">开奖号：</td>
			<td><?=$this->ifs($bet['lotteryNo'], '－')?></td>
			<td align="right">投注时间：</td>
			<td><?=date('m-d H:i:s',$bet['actionTime'])?></td>
		</tr>
		<tr>
			<td align="right">订单状态：</td>
			<td>
			<?php
 if($bet['isDelete']==1){ echo '<font color="#999999">已撤单</font>'; }elseif(!$bet['lotteryNo']){ echo '<font color="#009900">未开奖</font>'; }elseif($bet['zjCount']){ echo '<font color="red">已派奖</font>'; }else{ echo '未中奖'; } ?>
			</td>
            <td align="right">&nbsp;<!--发起庄内庄：--></td>
			<td>&nbsp;<?php ?></td>
        </tr>
		<tr>
			<td align="right">抢庄状态：</td>
			<td><?=$this->iff($bet['qz_uid'], '抢庄', '未抢')?></td>
			<td align="right">抢庄人：</td>
			<td><?=$this->ifs($bet['qz_username'], '－')?></td>
		</tr>
		
		<!-- 抢庄开始　-->
		<?php if($bet['qz_uid']){ ?>
		<tr>
			<td align="right">抢庄投注：</td>
			<td><?=number_format($bet['beiShu'] * $bet['mode'] * $bet['actionNum'] * ($bet['fpEnable']+1),2)?></td>
			<td align="right">抢庄返点：</td>
			<td><?=number_format(-$bet['fanDianAmount'], 2)?></td>
		</tr>
		<tr>
			<td align="right">抢庄赔付：</td>
			<td><?=number_format(- $bet['bonus'] - $bet['fanDianAmount'] - $bet['qz_chouShui'], 2)?></td>
			<td align="right">抢庄盈亏：</td>
			<td><?=number_format($bet['beiShu'] * $bet['mode'] * $bet['actionNum'] * ($bet['fpEnable']+1) - $bet['bonus'] - $bet['fanDianAmount'] - $bet['qz_chouShui'], 2)?></td>
		</tr>
		<?php } ?>
		<!-- 抢庄结束 -->
		
		
		<!-- 投注开始 -->
		<tr>
			<td align="right">投注：</td>
			<td><?=number_format($betCont, 2)?>元</td>
			<td align="right">中奖：</td>
			<td><?=$this->iff($bet['lotteryNo'], number_format($bet['bonus'], 2) .'元', '－')?></td>
		</tr>
		<tr>
			<td align="right">返点：</td>
			<td><?=$this->iff($bet['lotteryNo'], number_format($bet['fanDianAmount'], 2). '元', '－')?></td>
			<td align="right">个人盈亏：</td>
			<td><?=$this->iff($bet['lotteryNo'], number_format($bet['bonus'] - $betCont + $bet['fanDianAmount'], 2) . '元', '－')?></td>
		</tr>
		<!-- 投注结束 -->
        
        <tr>
        	<td align="right">来源：</td>
            <td colspan="3"><?php if($bet['betType']==0){echo 'web';}else if($bet['betType']==1){echo '手机';}else{echo '--';}?></td><?php if($bet['betType']==0){echo 'web端';}else if($bet['betType']==1){echo '手机端';}else if($bet['betType']==2){echo '客户端';}?>
        </tr>
	</table>
</div>
   </form>
</div>