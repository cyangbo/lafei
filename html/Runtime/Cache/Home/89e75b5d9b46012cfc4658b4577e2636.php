<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<META name="renderer" content="webkit">     
<META charset="utf-8">     
<META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">     
<META name="viewport" content="width=device-width, initial-scale=1.0">  
<title>推广链接－<?php echo S('WEB_NAME');?></title>
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

	
<link href="/Public/Home/css/nouislider.fox.css" rel="stylesheet">

</head>
<body>
	
	<!-- 头部 -->
	



	<!-- /头部 -->
	
	<!-- 主体 -->
	
<div class="effect mainnav-lg mainnav-fixed navbar-fixed footer-fixed" id="container">
	<div id="page-content">
		<form id="extension" role="form" action="/member/extension" method="post">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title text-primary"><img alt="" src="/Public/Home/images/main/link.png"> 
推  广  链  接
					</h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-3">
						
					</div>
					<div class="pad-btm form-inline">
						<div class="col-sm-9 table-toolbar-right ">
							                    							                     							                    
							<input name="CodeFlag" id="CodeFlag" type="hidden">
							<button class="btn btn-primary btn-labeled fa fa-plus" id="generatelink" type="button" max="<?php echo ($user["fanDian"]); ?>">生成推广链接</button>
						</div>
					</div>
					<table width="100%" class="table table-striped" id="my-datatable" cellspacing="0">
					<thead>
					<tr>
						<th  class="min-tablet text-center">
							编码
						</th>
						
						<th class="min-tablet text-center" style="width: 120px;">
							返点
						</th>
						<th class="min-tablet text-center" style="width: 120px;">
							会员类型
						</th>
						<th class="min-tablet text-center">
							链接地址
						</th>
						<th class="min-tablet text-center" style="width: 120px;">
							建立时间
						</th>
						
						<th class="min-tablet text-center" style="width: 80px;">
							操作
						</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($data as $var){ ?>
					<tr>						
						<td class="text-center">
							10000<?php echo ($var["lid"]); ?>
						</td>
						<td class="text-center">
							<?php echo ($var["fanDian"]); ?>
						</td>
						<td class="text-center">
							<?php echo ($this->iff($var['type'],'代理','会员')); ?>
						</td>
						<td><?php $url = 'http://'.$_SERVER['HTTP_HOST'].U('user/register?lid='.$var['lid'].'&uid='.$user['uid']); $url = $this->shortUrl($url); ?>
							<a href="<?php echo ($url); ?>" target="_blank" id="adv-url"><?php echo ($url); ?></a>
							<a onclick="copyUrl(this)" id="copy<?php echo ($var["lid"]); ?>" href="javascript:;" data-clipboard-text="<?php echo ($url); ?>"><span class="copy label label-mint pull-right copy-btn" data-clipboard-text="<?php echo ($url); ?>">复制</span>
							</a>
							
						</td>
						<td class="text-center">
							<?php echo date('Y/m/d H:i',$var['regTime']);?>
						</td>
						
						<td class="text-center">
							<a class="text-danger deletelink" href="javascript:;" lid="<?php echo ($var["lid"]); ?>"><i class="fa fa fa-close fa-lg"></i> 删除                                 </a>
						</td>
					</tr>
					<?php } ?>
					</tbody>
					</table>
					<textarea cols="20" rows="10" id="id-copy" style="display:none"></textarea>
				</div>
			</div>
			
			<div tabindex="0" class="modal fade" id="generatelink-modal" role="dialog" aria-hidden="true" aria-labelledby="generatelink-modal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title text-primary"><img alt="" src="linklist_files/link.png">  
生成推广链接
							</h4>
						</div>
						<div class="modal-body panel-body">
							<div class="tab-content modalcontent">
								<div class="tab-pane pad-btm fade in active" id="demo-bsc-tab-1">
									<table class="viewtbl">
									<tbody>
									<tr>
										<th style="width: 100px;">
											类型：
										</th>
										<td style="width: 150px; color: rgb(250, 84, 32);">
											<div class="radio">
												<label class="form-radio form-normal form-primary form-text"><input name="MemberType" id="radioAgent" value="1" data-val-required="MemberType 字段是必需的。" data-val="true" type="radio"> 代    理                                         </label>
												<label class="form-radio form-normal form-info form-text active"><input name="MemberType" id="radioMember" value="0" type="radio"> 会    员              
												</label>
										</div>
										</td>
										<th style="width: 100px;">
											返点：
										</th>
										<td style="color: rgb(250, 84, 32);">
											<label id="labRebate"></label>
										</td>
									</tr>
									<tr>
										<td colspan="4">											
											<div id="range-def" class="noUiSlider noUiSlider6 horizontal" style="width:520px;margin-left:10px;"><a style="left: 0%; z-index: 1;"><div class=""></div></a><input value="0.00" name="" type="hidden"></div>
										</td>
									</tr>
									</tbody>
									</table>									
								</div>
								
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary btn-labeled fa fa-lg" id="btnSubmit" action="<?php echo U('team/addlink');?>">生    成</button>
							<button class="btn btn-danger btn-labeled fa fa-lg" type="button" data-dismiss="modal">返    回</button>
						</div>
					</div>
				</div>
			</div>
			<div tabindex="0" class="modal fade" id="deletelink-modal" role="dialog" aria-hidden="true" aria-labelledby="deletelink-modal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title text-danger"><img alt="" src="linklist_files/link.png">  
删除推广链接
							</h4>
						</div>
						<div class="modal-body panel-body">
							<div class="form-group">
								<div class="input-group">
									<h3 class="text-danger">确定要删除该推广链接吗？</h3>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary btn-labeled fa fa-lg" id="deleteBtn" type="button" lid="0" uid="<?php echo ($user["uid"]); ?>">删    除</button><button class="btn btn-danger btn-labeled fa fa-lg" type="button" data-dismiss="modal">返    回</button>
						</div>
					</div>
				</div>
			</div>
			<input name="__RequestVerificationToken" type="hidden" value="CfDJ8Ktgxm2FAlNEsoI7VoMQlWl8bBf3AxcZkmpLap1-E6mXjtKkRbk-cNS8H4WxhFOvP4rtRSw-lYYly59nGemWmmP9QazpAwt6hdUfeeq_PjDG5F-CZlZN9HAcnm2NPH0ihZ6ZsKoeWmPkCb61fjYQIYXFTNOJAPOoGNAQn0pP9ovn4nu-Ty2Cv7AU1CT9ata-2w"><input name="m.State" type="hidden" value="false">
		</form>
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

	
<script src="/Public/Home/js/clipboard.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
	$('#deleteBtn').on('click', function () {
		var trNode = $(curObj).parent().parent();
		var codeFlag = trNode.children().eq(0).text();
		$('#deleteBtn').attr("disabled", true);
		$('#deleteBtn').text('删除中...');
		var me=this;
		$.ajax({
			type: "POST",
			url: "<?php echo U('team/deletelink');?>",
			data: { lid: $(me).attr('lid'), uid: $(me).attr('uid') },
			dataType: "json",
			global: false,
			success: function (result) {
				if (result.status==1) {
					$(curObj).parent().parent().remove();
				}
				showNiftyNoty(result.info);
				$('#deletelink-modal').modal('hide');
				$('#deleteBtn').removeAttr("disabled");
				$('#deleteBtn').text('确定删除');
			}, error: function () {
				showNiftyNoty('操作失败！');
				$('#deletelink-modal').modal('hide');
				$('#deleteBtn').removeAttr("disabled");
				$('#deleteBtn').text('确定删除');
			}
		});
	});
	$('.deletelink').on('click', function () {
		curObj = this;
		var lid = $(this).attr('lid');
		$('#deleteBtn').attr('lid',lid);
		$('#deletelink-modal').modal('show');
	});
	
	$('#btnSubmit').on('click', function () {
		var agent = document.getElementById('radioAgent').checked;
		var utype = agent ? 1:0;
		var action = $(this).attr('action');
		$.ajax({
			type: "POST",
			url: action,
			data: { type: utype, fanDian: $('#labRebate').val()},
			dataType: "json",
			global: false,
			success: function (data) {
				try {
					if (data.status == 0) {
						bootbox.alert(data.info);
					} else {
						
						$("#generatelink-modal").hide();
						window.location.href=data.url;
						//bootbox.alert("操作成功");
						//$("#betrecord").submit();
					}
				} catch (e) {
					bootbox.alert("操作失败，请梢后重试");
				}
			},
			error: null,
			cache: false
		});
		return false;
	});
	$('#generatelink').on('click', function () {
		$('#OperatType').val(1);
		
		$('#labRebate').text($('#Rebate option:selected').val());
		$('#labMark').text($('#Mark').val());
		$('#generatelink-modal').modal('show');
		loadbouns(0,$(this).attr('max'),'labRebate');
	});
});


    var btns = document.querySelectorAll('a');
    var clipboard = new Clipboard(btns);

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });

function copyUrl(self)
{
	showNiftyNoty(true,'复制成功！'); 
}
</script>

	<!-- /主体 -->

	<!-- 底部 -->
	


	<!-- /底部 -->
</body>
</html>