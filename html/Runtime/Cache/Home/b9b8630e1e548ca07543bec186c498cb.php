<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<META name="renderer" content="webkit">     
<META charset="utf-8">     
<META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">     
<META name="viewport" content="width=device-width, initial-scale=1.0">  
<title>帐变明细－<?php echo S('WEB_NAME');?></title>
<link href="/Public/Home/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/Home/css/nifty.min.css" rel="stylesheet">
<link href="/Public/Home/css/font-awesome.min.css" rel="stylesheet">
<link href="/Public/Home/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="/Public/Home/css/switchery.min.css" rel="stylesheet">
<link href="/Public/Home/css/css.min.css" rel="stylesheet">
<link href="/Public/Home/css/withdraw.css" rel="stylesheet">
<link href="/Public/Home/css/comm.min.css" rel="stylesheet">
<link href="/Public/Home/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="/Public/Home/css/dataTables.responsive.min.css" rel="stylesheet">

<meta name="GENERATOR" content="MSHTML 11.00.9600.16428">

<!-- IE浏览器时需要以下js支持 -->

<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

	
</head>
<body>
	
	<!-- 头部 -->
	



	<!-- /头部 -->
	
	<!-- 主体 -->
	
<div class="effect mainnav-lg mainnav-fixed navbar-fixed footer-fixed" id="container">
	<div id="page-content">
		<form id="teambetrecord" role="form" action="<?php echo U('team/searchRecord');?>" method="post">
			<div class="panel">
				<div class="panel-heading">
					
					<h3 class="panel-title text-primary"><i class="fa fa-cubes fa-lg text-default"></i> 代  理  中  心 》 帐 变 明 细</h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-2">
						<div class="dataTables_length" style="margin-top: -10px;">
							<h5>每页显示
							<select name="PageSize" class="form-control" id="PageSize" data-val-required="PageSize 字段是必需的。" data-val="true">
								<option selected="selected" value="10">10</option>
							</select>
							 条
							</h5>
						</div>
					</div>
					<div class="col-sm-10">
						<div class="dataTables_filter">
							<select autocomplete="off" name="type" class="form-control" id="LotteryId" style="width: 130px; display: inline;" data-val-required="LotteryId 字段是必需的。" data-val="true">
								<option selected="selected" value="0">请选择类型</option>
								<option value="1">账户充值</option>
								<option value="7">撤单返款</option>
								<option value="106">账户提现</option>
								<option value="8">提现失败</option>
								<option value="107">提现成功</option>
								<option value="9">系统充值</option>
								<option value="51">活动礼金</option>
								<option value="52">充值佣金</option>
								<option value="53">消费活动</option>
								<option value="101">投注扣款</option>
								<option value="6">中奖奖金</option>
								<option value="2">游戏返点</option>
								<option value="102">追号扣款</option>
								<option value="12">下级转账</option>
							</select>
							<select autocomplete="off" name="utype" class="form-control" id="TeamLevel" style="width: 130px; display: inline;" data-val-required="TeamLevel 字段是必需的。" data-val="true">
								<option selected="selected" value="0">所有人</option>
								<option value="1">自己</option>
								<option value="2">直属下级</option>
								<option value="3">所有下级</option>
							</select>
							<input autocomplete="off" name="username" class="form-control" id="MemberName" style="width: 100px;" type="text" placeholder="会员名" value="">							
							<input autocomplete="off" name="fromTime" autocomplete="off" class="form-control form_datetime" id="BeginDate" style="width: 130px;" type="text" placeholder="起始日期" value="<?php echo date('Y-m-d H:i',$GLOBALS['fromTime']);?>" data-date-format="yyyy-mm-dd hh:ii">
							<span style="margin-left: 5px;">-</span>
							<input name="toTime" autocomplete="off" class="form-control form_datetime" id="EndDate" style="width: 130px;" type="text" placeholder="截止日期" value="<?php echo date('Y-m-d H:i',$GLOBALS['toTime']);?>" data-date-format="yyyy-mm-dd hh:ii">
							<button class="btn btn-primary btn-labeled fa fa-search" id="j-query" type="button">查询</button>
						</div>
					</div>
					<span id="record-span">
						<?php
 $modeName=array('2.00'=>'元', '0.20'=>'角', '0.02'=>'分'); $liqTypeName=array( 1=>'充值', 2=>'返点', 5=>'停止追号', 6=>'中奖金额', 7=>'撤单', 8=>'提现失败返回冻结金额', 9=>'管理员充值', 10=>'解除抢庄冻结金额', 12=>'下级转账', 13=>'上级充值成功扣款', 50=>'签到赠送', 51=>'首次绑定银行卡赠送', 52=>'充值佣金', 53=>'消费活动', 54=>'充值赠送', 55=>'注册佣金', 100=>'抢庄冻结金额', 101=>'投注冻结金额', 102=>'追号投注', 103=>'抢庄返点金额', 105=>'抢庄赔付金额', 106=>'提现冻结', 107=>'提现成功扣除冻结金额', 108=>'开奖扣除冻结金额' ); ?>
<div>
<table width="100%" class="table table-striped" id="my-datatable" cellspacing="0">
	<thead>
		<tr>
			<th class="min-tablet text-center">时间</td>
			<th class="min-tablet text-center">用户名</td>
			<th class="min-tablet text-center">帐变类型</td>
			<th class="min-tablet text-center">单号</td>
			<th class="min-tablet text-center">游戏</td>
			<th class="min-tablet text-center">玩法</td>
			<th class="min-tablet text-center">期号</td>
			<th class="min-tablet text-center">模式</td>
			<th class="min-tablet text-center">资金</td>
			<th class="min-tablet text-center">余额</td>
		</tr>
	</thead>
	<tbody>
	<?php if($data){ foreach($data as $var){ ?>
		<tr class="odd" role="row">
			<td><?php echo substr(date('Y-m-d H:i:s', $var['actionTime']),2)?></td>
			<td><?=$var['username']?></td>
			<td><?=$liqTypeName[$var['liqType']]?></td>
			<!-- <td><?//=$var['info']?></td> -->
			
			<?php if($var['extfield0'] && in_array($var['liqType'], array(2,3,4,5,6,7,10,11,100,101,102,103,104,105,108))){ ?>
                <td><a href="#" action="<?=U('record/betInfo?id='.$var['extfield0']) ?>" width="800" class="text-primary showDetails" data-target="#details-modal" data-toggle="modal" data-value="<?php echo ($var['extfield0']); ?>"><font color="#009900"><?=$var['wjorderId']?></font></a>
                </td>
                <td><?=$types[$var['type']]['shortName']?></td>
                <td><?=$playeds[$var['playedId']]['name']?></td>
                <td><?=$var['actionNo']?></td>
                <td><?=$modeName[$var['mode']]?></td>
			<?php }elseif(in_array($var['liqType'], array(1,9,52))){?>
                <td><a href="#" action="<?=U('recharge/info?id='.$var['extfield0']) ?>" width="500" class="text-primary showDetails" data-target="#details-modal" data-toggle="modal"><font color="#009900"><?=$var['extfield1']?></font></a></td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
			<?php }elseif(in_array($var['liqType'], array(8,106,107))){?>
                <td><a href="#" action="<?=U('cash/info?id='.$var['extfield0']) ?>" width="500" title="提现信息" target="modal"><font color="#009900" class="showDetails"><?=$var['extfield0']?></font></a></td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                
            <?php }elseif(in_array($var['liqType'], array(12))){?>
                <td><a href="#" action="<?=U('cash/turnMoneyInfo?id='.$var['extfield0']) ?>" width="500" title="上级转账" target="modal"><font color="#009900" class="showDetails"><?=$var['id']?></font></a></td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                
            <?php }else{ ?>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
            <?php } ?>
            
            <td><?=$var['coin']?></td>
			
			<td><?=$var['userCoin']?></td>
		</tr>
	<?php } }else{ ?>
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
	$('.showDetails').bind('click', showBet);
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
					</span>
				</div>
			</div>
			<input name="__RequestVerificationToken" type="hidden" value="CfDJ8Ktgxm2FAlNEsoI7VoMQlWk-r1WEVUMma9pxU878QzneW2KIrTfgUbuPj__QCtkNRRZvXW6vyGMINg6RucmHxen7pqyeFXfPOriSNInvCqqC13KtPZ_vKB1TImP03Q98KRUIkr3KghHY6GCGBNtfqlS9d9_JZXmL67XbkOB6FJORYTEoyRwdIbKmaIc06OW0qw">
		</form>
		<div tabindex="-1" class="modal fade" id="details-modal" role="dialog" aria-hidden="true" aria-labelledby="details-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title text-primary"><i class="fa fa-th-list fa-lg"></i>  详 情                 
						</h4>
					</div>
					<div id="betDetail">
					</div>
					<div class="modal-footer">
						<button class="btn btn-warning btn-labeled fa fa-mail-reply" data-dismiss="modal">关闭</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	

<script src="/Public/Home/js/jquery.min.js"></script>
<script src="/Public/Home/js/bootstrap.min.js"></script>
<script src="/Public/Home/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Public/Home/js/bootstrap-datetimepicker.zh-CN.min.js"></script>
<script src="/Public/Home/js/nifty.min.js"></script>
<script src="/Public/Home/js/switchery.min.js"></script>
<script src="/Public/Home/js/md5.min.js"></script>
<script src="/Public/Home/js/common.min.js"></script>
<script src="/Public/Home/js/dataTables.min.js"></script>
<script src="/Public/Home/js/dataTables.bootstrap.min.js"></script>
<script src="/Public/Home/js/dataTables.responsive.min.js"></script>
<script src="/Public/Home/js/bootbox.min.js"></script>
<script src="/Public/Home/js/jquery.nouislider.all.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		$("body").click(
		  function toggle() {
			  $("div#demo-set", window.top.document).removeClass("open");
			  $(".mega-dropdown", window.top.document).removeClass("open");
			  $(".dropdown", window.top.document).removeClass("open");
			  $(".lskj").fadeOut(200);
		  }
		);
	});
	$('.form_datetime').datetimepicker({
		autoclose: 1,
		todayBtn: 0,
		minView: 2,
		language: 'zh-CN',
		format: 'yyyy-mm-dd hh:ii'
	});
	$('.form_datetime').focus(function () {
		this.blur();
	});
</script>

	
<script src="/Public/Home/js/dataTables.min.js"></script>
<script src="/Public/Home/js/dataTables.bootstrap.min.js"></script>
<script src="/Public/Home/js/dataTables.responsive.min.js"></script>
<script src="/Public/Home/js/bootbox.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
	$("#j-query").on("click", function () {				
		$.ajax({
			type: "GET",
			url: '<?php echo U("team/searchCoin");?>',
			data: { liqType: $('#LotteryId').val(), utype: $('#TeamLevel').val(), username: $('#MemberName').val(), fromTime: $('#BeginDate').val(), toTime: $('#EndDate').val()},
			dataType: "html",
			global: false,
			success: function (result) {
				$('#record-span').html(result);
			}, error: function (err) {
				var t=err;				
			}
		});
		//$("#teambetrecord").submit();
	});
	
	$('#PageSize').on('change', function () {
		this.form.submit();
	});
	$('.paging_button').on('click', function () {
		var pageIndex = $(this).attr('title');
		$('#PageIndex').val(pageIndex);
		this.ownerDocument.forms[0].submit();
	});
	
});

</script>

	<!-- /主体 -->

	<!-- 底部 -->
	


	<!-- /底部 -->
</body>
</html>