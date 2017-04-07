<?php if (!defined('THINK_PATH')) exit();?><table class="tbl" id="tbproject">
<tbody>
<tr>
	<th>
		编号
	</th>
	<th>
		期号
	</th>
	<th>
		状态
	</th>
</tr>
<?php foreach($order_list as $var){ ?>
<tr>
	<td>
		<a href="javascript:" title="查看投注详情" class="blue" rel="projectinfo" action="<?php echo U('record/betInfo2?id='.$var['id']);?>" data-value="<?php echo ($var['id']); ?>"><?php echo ($var["wjorderId"]); ?></a>
	</td>
	<td>
		<?php echo ($var["actionNo"]); ?>
	</td>
	<td>
		<?php if($var['isDelete']==1){ echo '<label class="gray">已撤单</label>'; }elseif(!$var['lotteryNo']){ echo '<label class="gray">未开奖</label>'; }elseif($var['zjCount']){ echo '<label class="red">已中奖</label>'; }else{ echo '<label class="red">未中奖</label>'; } ?>
	</td>
</tr>
<?php } ?>
</tbody>
</table>