<?php if (!defined('THINK_PATH')) exit(); $modeName=array('2.00'=>'元', '0.20'=>'角', '0.02'=>'分'); ?>
<div>
<table width="100%" class="table table-striped" id="my-datatable" cellspacing="0">
	<thead>
		<tr class="table_b_th">
			<th>用户名</th>
			<th>余额</th>
            <th>充值总额</th>
            <th>提现总额</th>
			<th>投注总额</th>
			<th>中奖总额</th>
			<th>总返点</th>
			<th>活动</th>
			<th>总盈亏</th>
			<th>查看</th>
		</tr>
	</thead>
	<tbody class="table_b_tr">
	<?php if($data){ foreach($data as $var){ $count['betAmount']+=$var['betAmount']; $count['zjAmount']+=$var['zjAmount']; $count['fanDianAmount']+=$var['fanDianAmount']; $count['brokerageAmount']+=$var['brokerageAmount']; $count['cashAmount']+=$var['cashAmount']; $count['coin']+=$var['coin']; $count['rechargeAmount']+=$var['rechargeAmount']; ?>
		<tr>
			<td><?=$this->ifs($var['username'], '0.0000')?></td>
			<td><?=$this->ifs($var['coin'], '0.0000')?></td>
            <td><?=$this->ifs($var['rechargeAmount'], '0.0000')?></td>
			<td><?=$this->ifs($var['cashAmount'], '0.0000')?></td>
			<td><?=$this->ifs($var['betAmount'], '0.0000')?></td>
			<td><?=$this->ifs($var['zjAmount'], '0.0000')?></td>
			<td><?=$this->ifs($var['fanDianAmount'], '0.0000')?></td>
            <td><?=$this->ifs($var['brokerageAmount'], '0.0000')?></td>
			<td><?=$this->ifs($var['zjAmount']-$var['betAmount']+$var['fanDianAmount'], '0.0000')?></td>
            <td>
                <?php {?>
                <a target="ajax" class="text-primary" href="<?=U('team/searchReport?parentId='.$var['uid'].'&fromTime='.$para['fromTime'].'&toTime='.$para['toTime']) ?>">下级</a>
				<?php }?>
                <?php if($var['uid']!=$user['uid'] && $var['parentId']){?>
                  <a target="ajax" class="text-primary" href="<?=U('team/searchReport?uid='.$var['uid'].'&fromTime='.$para['fromTime'].'&toTime='.$para['toTime']) ?>">上级</a>
				<?php }?>
            </td>
		</tr>
	<?php } ?>
		<tr>
			<td><span class="spn9">本页总结</span></td>
            <td><?=$this->ifs($count['coin'], '0.0000')?></td>
            <td><?=$this->ifs($count['rechargeAmount'], '0.0000')?></td>
			<td><?=$this->ifs($count['cashAmount'], '0.0000')?></td>
			<td><?=$this->ifs($count['betAmount'], '0.0000')?></td>
			<td><?=$this->ifs($count['zjAmount'], '0.0000')?></td>
			<td><?=$this->ifs($count['fanDianAmount'], '0.0000')?></td>
            <td><?=$this->ifs($count['brokerageAmount'], '0.0000')?></td>
			<td><?=$this->ifs($count['zjAmount']-$count['betAmount']+$count['fanDianAmount'], '0.0000')?></td>
			<td></td>
		</tr>
		<tr>
			<td><span class="spn9">团队总结</span></td>
            <td><?=$this->ifs($all['coin'], '0.0000')?></td>
            <td><?=$this->ifs($all['rechargeAmount'], '0.0000')?></td>
			<td><?=$this->ifs($all['cashAmount'], '0.0000')?></td>
			<td><?=$this->ifs($all['betAmount'], '0.0000')?></td>
			<td><?=$this->ifs($all['zjAmount'], '0.0000')?></td>
			<td><?=$this->ifs($all['fanDianAmount'], '0.0000')?></td>
			<td><?=$this->ifs($all['brokerageAmount'], '0.0000')?></td>
			<td><?=$this->ifs($all['zjAmount']-$all['betAmount']+$all['fanDianAmount'], '0.0000')?></td>
			<td></td>
		</tr>
	<?php }else{ ?>
    <tr><td colspan="12" width="910px">当前没有查询到任何数据。</td></tr>
    <?php } ?>
	</tbody>
</table>
</div>
<div class="page">
    <?php echo ($_page); ?>
</div>
<script src="/Public/Home/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('a[target=ajax]').bind('click', function(){
		var url = $(this).attr('href');
		$('#record-span').load(url);
		return false;
	});
	//解决分页问题
	$('.page a').bind('click', function(){
		if(this.tagName == 'A'){
			var parent = this.parentNode.parentNode;
			var value = $(parent).attr('target');
			if(value=='_blank')	
				return true;
			var url = $(this).attr('href');
			$('#record-span').load(url);
			return false;
		}
	});
});
</script>