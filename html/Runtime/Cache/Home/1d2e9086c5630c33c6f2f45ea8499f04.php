<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<META name="renderer" content="webkit">     
<META charset="utf-8">     
<META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">     
<META name="viewport" content="width=device-width, initial-scale=1.0">  
<title>消费报表－<?php echo S('WEB_NAME');?></title>
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
					<div class="panel-control" style="display:none">
						<ul class="nav nav-tabs">
							<li class="active text-bold"><a href="http://jsl-js.yaoxingdinshen.com/detail/teambetrecord">团 
  队 投 注 
							</a></li>
							<li class="text-bold" style="display:none"><a href="http://jsl-js.yaoxingdinshen.com/detail/teamchaserecord"> 
  团 队 追 号 
							</a></li>
						</ul>
					</div>
					<h3 class="panel-title text-primary"><i class="fa fa-money fa-lg text-default"></i> 消 费 报 表</h3>
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
							<input autocomplete="off" name="username" class="form-control" id="MemberName" style="width: 100px;" type="text" placeholder="会员名" value="">							
							<input autocomplete="off" name="fromTime" autocomplete="off" class="form-control form_datetime" id="BeginDate" style="width: 130px;" type="text" placeholder="起始日期" value="<?php echo date('Y-m-d H:i',$GLOBALS['fromTime']);?>" data-date-format="yyyy-mm-dd hh:ii">
							<span style="margin-left: 5px;">-</span>
							<input name="toTime" autocomplete="off" class="form-control form_datetime" id="EndDate" style="width: 130px;" type="text" placeholder="截止日期" value="<?php echo date('Y-m-d H:i',$GLOBALS['toTime']);?>" data-date-format="yyyy-mm-dd hh:ii">
							<button class="btn btn-primary btn-labeled fa fa-search" id="j-query" type="button">查询</button>
						</div>
					</div>
					<span id="record-span">
						<?php
 $modeName=array('2.00'=>'元', '0.20'=>'角', '0.02'=>'分'); ?>
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
						<h4 class="modal-title text-primary"><i class="fa fa-th-list fa-lg"></i>  投 注 详  
情                 
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
			url: '<?php echo U("team/searchReport");?>',
			data: { username: $('#MemberName').val(), fromTime: $('#BeginDate').val(), toTime: $('#EndDate').val()},
			dataType: "html",
			global: false,
			success: function (result) {
				$('#record-span').html(result);
				$('.showDetails').bind('click', showBet);
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
	
	$('.showDetails').bind('click', showBet);
	
	function showBet() {
		var href = $(this).attr('action');
		var v_id = $(this).attr('data-value');
		var me = this;
		$("#betDetail").empty();
		$.ajax({
			type: "GET",
			url: href,
			data: { },
			dataType: "html",
			global: false,
			success: function (data) {
				$("#betDetail").append(data);
				$("#cancelproject").click(function () {
					if (true) {
						$.ajax({
							type: "POST",
							url: "<?php echo U('game/deletecode');?>",
							data: { id: v_id },
							dataType: "json",
							global: false,
							success: function (data) {
								try {
									if (data.status == 0) {
										alert(data.info);
									} else {
										$(me).closest("tr").addClass("cancel");
										$(me).parent().siblings("td:last").html('<label class="graylab">已撤单</label>');
										$("#details-modal").hide();
										bootbox.alert("撤单成功");
										//$("#betrecord").submit();
									}
								} catch (e) {
									bootbox.alert("撤单失败，请梢后重试");
								}
							},
							error: null,
							cache: false
						})
					}
				})
			},
			error: null,
			cache: false
		})
	}
});

</script>

	<!-- /主体 -->

	<!-- 底部 -->
	


	<!-- /底部 -->
</body>
</html>