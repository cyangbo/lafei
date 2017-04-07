<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<META name="renderer" content="webkit">     
<META charset="utf-8">     
<META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">     
<META name="viewport" content="width=device-width, initial-scale=1.0">  
<title>投注记录－<?php echo S('WEB_NAME');?></title>
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
					<h3 class="panel-title text-primary"><i class="fa fa-cubes fa-lg text-default"></i> 代  理  中  心 》 投 注 记 录</h3>
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
								<option selected="selected" value="0">请选择彩种</option>
								<?php if($types) foreach($types as $var){ if($var['enable']){ ?>
								<option value="<?=$var['id']?>"><?=$var['title']?>
								</option>
								<?php }} ?>
							</select>
							<select autocomplete="off" name="utype" class="form-control" id="TeamLevel" style="width: 130px; display: inline;" data-val-required="TeamLevel 字段是必需的。" data-val="true">
								<option selected="selected" value="0">所有人</option>
								<option value="1">自己</option>
								<option value="2">直属下级</option>
								<option value="3">所有下级</option>
							</select>
							<select autocomplete="off" name="state" class="form-control" id="state" style="width: 130px; display: inline;" data-val-required="TeamLevel 字段是必需的。" data-val="true">
								<option value="0" selected>所有状态</option>
								<option value="1">已派奖</option>
								<option value="2">未中奖</option>
								<option value="3">未开奖</option>
								<option value="4">追号</option>
								<option value="5">撤单</option>
							</select>
							<input autocomplete="off" name="username" class="form-control" id="MemberName" style="width: 100px;" type="text" placeholder="会员名" value="">
							<input autocomplete="off" name="betId" class="form-control" id="RecordId" style="width: 100px;" type="text" placeholder="方案号" value="">
							<input autocomplete="off" name="fromTime" autocomplete="off" class="form-control form_datetime" id="BeginDate" style="width: 130px;" type="text" placeholder="起始日期" value="<?php echo date('Y-m-d H:i',$GLOBALS['fromTime']);?>" data-date-format="yyyy-mm-dd hh:ii">
							<span style="margin-left: 5px;">-</span>
							<input name="toTime" autocomplete="off" class="form-control form_datetime" id="EndDate" style="width: 130px;" type="text" placeholder="截止日期" value="<?php echo date('Y-m-d H:i',$GLOBALS['toTime']);?>" data-date-format="yyyy-mm-dd hh:ii">
							<button class="btn btn-primary btn-labeled fa fa-search" id="j-query" type="button">查询</button>
						</div>
					</div>
					<span id="record-span">
						<?php
 $modeName=array('2.00'=>'元', '0.20'=>'角', '0.02'=>'分'); ?>
<table width="100%" class="table table-striped" id="my-datatable" cellspacing="0">
	<thead>
	<tr>
		<th class="min-tablet text-center">
			方案
		</th>
		<th class="min-tablet text-center">
			会员名
		</th>
		<th class="min-tablet text-center">
			彩种
		</th>
		<th class="min-tablet text-center">
			玩法
		</th>
		<th class="min-tablet text-center">
			期号
		</th>
		<th class="min-desktop text-center">
			时间
		</th>
		<th class="min-desktop text-center">
			倍数模式
		</th>
		<th class="min-desktop text-center">
			投注金额
		</th>
		<th class="min-desktop text-center">
			中奖号码
		</th>
		<th class="min-desktop text-center">
			中奖金额
		</th>
		<th class="min-desktop text-center">
			状态
		</th>
	</tr>
	</thead>
	<tbody>
	<?php if($data){ foreach($data as $var){ ?>
		<tr class="odd" role="row">
			<td class="text-center">
				<a action="<?=U('record/betInfo?id='.$var['id']) ?>" class="text-primary showDetails" href="#" data-toggle="modal" data-value="<?php echo ($var['id']); ?>" 
      data-target="#details-modal"><?=$var['wjorderId']?></a>
			</td>
            <td class="text-center">
			<?php
 if($var['username']){echo $var['username'];}else{echo '--';}; ?>
            </td>
			<td class="text-center"><?=$this->ifs($types[$var['type']]['shortName'],$types[$var['type']]['title'])?></td>
			<td class="text-center"><?=$playeds[$var['playedId']]['name']?></td>		
			<td class="text-center"><?=$var['actionNo']?></td>
			<td class="text-center"><?=date('m-d H:i:s', $var['actionTime'])?></td>			
			<td class="text-center"><?=$var['beiShu'].'倍,'?> <?=$modeName[$var['mode']]?></td>
			<td class="text-center"><?=$var['mode']*$var['beiShu']*$var['actionNum']*($var['fpEnable']+1)?>元</td>
			<td class="text-center"><?=$this->ifs($var['lotteryNo'], '--')?></td>
			<td class="text-center"><?=$this->iff($var['lotteryNo'], number_format($var['bonus'], 2), '0.00')?></td>
			<td class="text-center">
			<?php
 if($var['isDelete']==1){ echo '<label class="graylab">已撤单</label>'; }elseif(!$var['lotteryNo']){ echo '<label class="graylab">未开奖</label>'; }elseif($var['zjCount']){ echo '<label class="redlab">已中奖</label>'; }else{ echo '<label class="redlab">未中奖</label>'; } ?>
			</td>
		</tr>
	<?php } }else{ ?>
    <tr><td colspan="12" width="910px">当前没有查询到任何数据。</td></tr>
    <?php } ?>
	</tbody>
</table>
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
			url: '<?php echo U("team/searchRecord");?>',
			data: { type: $('#LotteryId').val(), utype: $('#TeamLevel').val(), state: $('#state').val(), username: $('#MemberName').val(), betId: $('#RecordId').val(), fromTime: $('#BeginDate').val(), toTime: $('#EndDate').val()},
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