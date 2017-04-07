<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<META name="renderer" content="webkit">     
<META charset="utf-8">     
<META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">     
<META name="viewport" content="width=device-width, initial-scale=1.0">  
<title>会员管理－<?php echo S('WEB_NAME');?></title>
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
<style type="text/css">
        .form-horizontal .has-feedback .form-control-feedback {
            top: 7px;
            right: 10px;
        }
        .modal-footer button {
            min-width: 100px;
            font-size: 16px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .range {
            display: table;
            width: 100%;
            border-radius: 5px;
            margin-top: 10px;
            height: 30px;
            box-shadow: 0px 2px 3px #ccc inset;
            background-color: #ebebeb;
        }
            .range span {
                display: table-cell;
                width: 50px;
                vertical-align: middle;
                text-align: center;
            }
            .range > div {
                padding: 0;
            }
        #range-def-val {
            color: #fc4c23;
        }
        #range-def {
            margin: 0;
            margin-top: 10px;
        }
        .noUi-connect {
            background: linear-gradient(to right,#fe9732, #f35a31);
        }
        .noUi-handle {
            background: linear-gradient(#fe9732, #f35a31);
            border: 1px #ed4f2a solid;
            box-shadow: 0px 0px 3px #e94b26;
        }
        .formul {
            width: 520px;
            overflow: hidden;
            padding-bottom: 10px;
        }
            .formul li {
                list-style: none;
                padding-top: 5px;
            }
                .formul li p {
                    height: 36px;
                    line-height: 36px;
                    position: relative;
                }
                .formul li > span {
                    display: block;
                    padding-bottom: 10px;
                }
                .formul li p i {
                    display: inline-block;
                    width: 36px;
                    height: 36px;
                    text-align: center;
                    font-size: 18px;
                    line-height: 36px;
                    color: #ccc;
                    position: absolute;
                    left: 0;
                    top: 2px;
                    padding: 0;
                }
                .formul li p input {
                    border: 0;
                    width: 100%;
                    background-color: #fff;
                    border: 1px #ddd solid;
                    border-radius: 2px;
                    box-sizing: border-box;
                    padding-left: 40px;
                    transition: border .5s;
                }
                    .formul li p input:focus {
                        border: 1px #489aed solid;
                        box-shadow: 0px 0px 5px #eee;
                    }
                .formul li p em {
                    position: absolute;
                    right: 10px;
                    font-style: normal;
                    color: #489aed;
                }
        .control-label {
            line-height: 24px;
        }
        .form-checkbox.form-normal.form-primary:hover:before, .form-radio.form-normal.form-primary.active:before, .form-checkbox.form-normal.form-primary:not(.active):hover:after {
            border-color: #f37032;
        }
        .form-checkbox.form-normal.form-primary.active:before, .form-radio.form-normal.form-primary.active:after {
            background-color: #f37032;
        }
</style>

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
					<h3 class="panel-title text-primary">
						<i class="fa fa-users fa-lg text-default"></i> 会  员  列  表
					</h3>
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
							<select autocomplete="off" name="utype" class="form-control" id="TeamLevel" style="width: 130px; display: inline;" data-val-required="TeamLevel 字段是必需的。" data-val="true">
								<option selected="selected" value="0">所有人</option>
								<option value="1">自己</option>
								<option value="2">直属下级</option>
								<option value="3">所有下级</option>
							</select>
							
							<input autocomplete="off" name="username" class="form-control" id="MemberName" style="width: 100px;" type="text" placeholder="会员名" value="">							
							
							<button class="btn btn-primary btn-labeled fa fa-search" id="j-query" type="button">查询</button>
							<button type="button" class="btn btn-success btn-labeled fa fa-plus" id="addMember" max="<?php echo ($user["fanDian"]); ?>">新增</button>
						</div>
					</div>
					<span id="record-span">
						
<div>
<table width="100%" class="table table-striped" id="my-datatable" cellspacing="0">
	<thead>
		<tr class="table_b_th">
			<th>用户名</td>
            <th>用户类型</td>
            <th>返点</td>
			<th>余额</td>
			<th>注册时间</td>
			<th>状态</td>
			<th>操作</td>
		</tr>
	</thead>
	<tbody class="table_b_tr">
	<?php if($data){ foreach($data as $var){ ?>
		<tr>
			<td><?=$var['username']?></td>
            <td><?=$this->iff($var['type'],'代理','会员')?></td>
            <td><?=$var['fanDian']?>%</td>
			<td><?=$var['coin']?></td>
			<td><?=date('Y-m-d H:i',$var['regTime'])?></td>
			<td><?=$this->iff($var['enable'],'正常','冻结')?></td>                            
			<td>
			<?php if($user['uid']!=$var['uid'] && $var['parentId']==$user['uid']){ ?>
			<a class="text-primary updateMember" href="#" target="modal" usertype="<?php echo ($var["type"]); ?>" title="<?php echo ($var["username"]); ?>" min="<?php echo ($var["fanDian"]); ?>" max="<?php echo ($user["fanDian"]); ?>">修改</a>&nbsp;&nbsp;
			<?php } ?>
			<?php if($var['type']==1) { ?>
			<a target="ajax" class="text-primary" href="<?=U('team/searchMember?utype=2&uid='.$var['uid']) ?>">查看下级</a>
			<?php } ?>
			</td>
            
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
<script src="/Public/Home/js/bootstrap.min.js"></script>
<script src="/Public/Home/js/jquery.nouislider.all.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('a[target=ajax]').bind('click', function(){
		var url = $(this).attr('href');
		$('#record-span').load(url);
		return false;
	});
	
	$('.updateMember').bind('click', function () {
		$('#MemberQuota').val(0);
		$('#OperatType').val(2);
		$('#operatTitle').text('修改会员');
		$('#username').val($(this).attr('title'));
		$("#username").attr("readonly", true);
		$('#li-password').css('display', 'none');
		var usertype = $(this).attr('usertype');
		if (usertype == '1') {
			$('#MemberType').val(1);
			$('#radioAgent').click();
		} else {
			$('#MemberType').val(0);
			$('#radioMember').click();
		}
		$('#btnSubmit').attr('action' , "<?php echo U('team/userUpdateed');?>");
		$('#add-modal').modal('show');			
		loadbouns($(this).attr('min'),$(this).attr('max'),'range-def-val');
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
		<form id="operatmember" role="form" action="<?php echo U('team/addMember');?>" method="post">
			<input name="NewPageSize" id="NewPageSize" type="hidden" value="10" data-val-required="NewPageSize 字段是必需的。" data-val="true">
			<input name="NewPageIndex" id="NewPageIndex" type="hidden" value="1" data-val-required="NewPageIndex 字段是必需的。" data-val="true">
			<input name="OperatType" id="OperatType" type="hidden" value="1" data-val-required="OperatType 字段是必需的。" data-val="true">
			<div tabindex="-1" class="modal fade" id="add-modal" role="dialog" aria-hidden="true" aria-labelledby="add-modal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title text-primary"><i class="fa fa-user fa-lg"></i><label id="operatTitle"> 
新 增
							</label></h4>
						</div>
						<div class="modal-body">
							<div class="tab-content">
								<div class="modalcontent">
									<ul class="formul">
										<li><span class="text-danger" id="errorInfo"></span></li>
										<li>
										<div class="radio">
											<label class="form-radio form-normal form-primary form-text"><input name="MemberType" id="radioAgent" type="radio" value="1" data-val-required="MemberType 字段是必需的。" data-val="true"> 代    理                                         </label>
											<label class="form-radio form-normal form-info form-text"><input name="MemberType" id="radioMember" type="radio" value="0"> 会    员              
											</label>
										</div>
										</li>
										<li>
										<p>
											<i class="fa fa-user"></i>
											<input name="username" class="form-control" id="username" type="text" maxlength="15" placeholder="请输入账户名称" value="" autocomplete="off">
										</p>
										<span>账户名称不超过15个字符，以字母开头，可包含数字和下划线。</span></li>
										<li id="li-password" style="display: none;">
										<p>
											<i class="fa fa-lock"></i>
											<input id="PlainText" style="padding-right: 55px;" type="text" maxlength="50" placeholder="请输入账户密码" value="123456"><em style="cursor: pointer;" onclick="$('#PlainText').val('123456');">默认密码</em>
											<input name="Password" id="Password" type="hidden">
										</p>
										<span>默认密码为：123456</span></li>
										<li>
										<div>
											<div>
												<strong>您当前选择的奖金是：</strong>
												<input name="MemberQuota" id="range-def-val" style="border: currentColor; border-image: none; width: 60px; height: 22px; background-color: rgb(246, 246, 246);" onfocus="$(this).blur();" type="text" data-val-required="MemberQuota 字段是必需的。" data-val="true" data-val-number="The field MemberQuota must be a number.">
											</div>
											<div class="range">
												<span id="range-def-min">0</span>
												<div id="range-def" class="noUiSlider noUiSlider6 horizontal">
												</div>
												<span id="range-def-max">0</span>
											</div>
										</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary btn-labeled fa fa-lg" id="btnSubmit" type="button" action="">确    定</button><button class="btn btn-danger btn-labeled fa fa-lg" type="button" data-dismiss="modal">返    回</button>
						</div>
					</div>
				</div>
			</div>
			<input name="__RequestVerificationToken" type="hidden" value="CfDJ8Ktgxm2FAlNEsoI7VoMQlWm440TH4cX3yQwGkeO89wwu1oPHa2ot4-fNKUbA4XYCokImmsLV15JQWSBBogn-lODZVYvoG8elQDGkc7A8LdLEES7FnMvtRp6Fmb6scjfk1jd8KFTpLcMz737sNA2D_B-oMR5E_e4fooHPwDcJ-YspV3J2aFuc3Bj2AQncJnNHjw">
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

	
<script type="text/javascript">

$(document).ready(function () {
	$("#j-query").on("click", function () {				
		$.ajax({
			type: "GET",
			url: '<?php echo U("team/searchMember");?>',
			data: { utype: $('#TeamLevel').val(), username: $('#MemberName').val()},
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
	
	$('#addMember').on('click', function () {
		$('#radioAgent').click();
		$('#MemberQuota').val(0);
		$('#OperatType').val(1);
		$('#operatTitle').text('新增会员');
		$('#username').val('');
		$('#add-modal').modal('show');
		$('#li-password').css('display', 'block');
		$('#btnSubmit').attr('action' , "<?php echo U('team/insertMember');?>");
		loadbouns(0,$(this).attr('max'),'range-def-val');
	});
	
	$('#btnSubmit').on('click', function () {
		var agent = document.getElementById('radioAgent').checked;
		var utype = agent ? 1:0;
		var name = $('#username').val();
		var action = $(this).attr('action');
		$.ajax({
			type: "POST",
			url: action,
			data: { type: utype, username: name, password: $('#PlainText').val(), fanDian: $('#range-def-val').val()},
			dataType: "json",
			global: false,
			success: function (data) {
				try {
					if (data.status == 0) {
						bootbox.alert(data.info);
					} else {
						
						$("#add-modal").hide();
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
	});
	
});

</script>

	<!-- /主体 -->

	<!-- 底部 -->
	


	<!-- /底部 -->
</body>
</html>