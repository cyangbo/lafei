<?php if (!defined('THINK_PATH')) exit(); $stateName=array('已到帐', '正在办理', '已取消', '已支付', '失败'); ?>
<div>
<table width="100%" class="table table-striped" id="my-datatable" cellspacing="0">
	<thead>
		<tr class="table_b_th">
			<th>用户帐号</td>
			<th>编号</td>			
			<th>充值金额</td>
			<th>实际到账</td>
			<th>充值银行</td>
			<th>状态</td>
			<th>成功时间</td>
			<th>备注</td>			
		</tr>
	</thead>
	<tbody class="table_b_tr">
	<?php if($data){ foreach($data as $var){ ?>
		<tr>
			<td><?=$var['username']?></td>
			<td><?=$var['rechargeId']?></td>
			<td><?=$var['amount']?></td>
			<td><?=$var['rechargeAmount']?></td>
			<td><?=$bankData[$var['mBankId']]['name']?></td>
			<td><?=$this->iff($var['state'], '充值成功', '<span style="color:#653809">正在处理</span>')?></td>
            <td><?=$this->iff($var['state'], date('m-d H:i:s', $var['actionTime']), '--')?></td>
			<td><?=$var['info']?></td>
		</tr>
	<?php } ?>
	<?php }else{ ?>
    <tr><td colspan="12" width="910px">当前没有查询到任何数据。</td></tr>
    <?php } ?>
	</tbody>
</table>
</div>
<div class="page">
    <?php echo ($_page); ?>
</div>