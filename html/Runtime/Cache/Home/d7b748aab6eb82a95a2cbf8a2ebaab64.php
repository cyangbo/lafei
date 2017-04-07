<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<META name="renderer" content="webkit">     
<META charset="utf-8">     
<META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">     
<META name="viewport" content="width=device-width, initial-scale=1.0">  

    <title>申请提现－<?php echo S('WEB_NAME');?></title>

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
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><img alt="" src="cash_files/tx.png">提现</h3>
                </div>
                <form class="panel-body form-horizontal form-padding" id="withdrawform" role="form" action="<?php echo U('Cash/cash');?>" method="post">
                    <div class="tixian">
                        <p>
                            <label>提款信息</label>
                            <div>
                                <label>提款时间：</label> 从 <strong><?php echo ($settings["cashFromTime"]); ?></strong> 至 <strong><?php echo ($settings["cashToTime"]); ?></strong>. 每天限制提款
                                <strong><?php echo ($settings["cashTimes"]); ?></strong>次 最小提款额：
                                <strong><?php echo ($settings["cashMin"]); ?></strong> 元，最大提款额：<strong><?php echo ($settings["cashMax"]); ?></strong> 元
                                <br> 系统消费比例限制为：
                                <strong><?php echo ($settings["cashMinAmount"]); ?>%</strong>
                            </div>
                            <p>
                            </p>
                            <p>
                                <label>可提现金额</label><strong><input name="TikuanCash" id="TikuanMoney" type="number" value="<?php echo ($coin['coin']); ?>" readonly='true' data-val-required="TikuanMoney 字段是必需的。" data-val-number="The field TikuanMoney must be a number." data-val="true"></strong>元
                            </p>
                            <p>
                                <label>用户名</label><strong><input name="TikuanUser" id="TikuanMoney" type="text" value="<?php echo ($coin['username']); ?>" readonly='true' data-val-required="TikuanMoney 字段是必需的。"  data-val="true"></strong>
                            </p>
                            <p>
                                <label>提现金额</label><strong><input name="TikuanMoney" id="TikuanMoney" type="number" value="100" data-val-required="TikuanMoney 字段是必需的。" data-val-number="The field TikuanMoney must be a number." data-val="true"></strong>元
                            </p>
                            <p>
                                <label>提款银行</label>
                                <select class="selectpicker dropdown-toggle selectpicker btn-default" data-val="true" data-val-required="UserBankId 字段是必需的。" id="UserBankId" name="UserBankId">
                                    <?php foreach($bank as $b) { ?>
                                    <option value="<?php echo ($b["id"]); ?>">[<?php echo ($b["name"]); ?>][
                                        <?=mb_substr($b['username'],0,1,'utf-8').'**' ?>]卡尾号:
                                            <?=preg_replace('/^.*(\w{4})$/', '\1', $b['account'])?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </p>
                            <p>
                                <label>资金密码</label><strong><input name="FundsPass" id="FundsPass" type="password" autocomplete="off"></strong>
                            </p>
                            <div style="text-align: center; padding-bottom: 20px;">
                                <button autocomplete="off" class="btn btn-primary" style="width: 100px;" type="submit">确定</button>
                            </div>
                    </div>
                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8Ktgxm2FAlNEsoI7VoMQlWkLkjIptuUZo1Dq51FM7kyVZsOZ31SdozfDgEKe-jmiZmYtH3Bwa56DRqYZd9NnTDVuQjv43713zSTyE7pjt2QhssiXbfc79kCwH2U5Mi1fb_b6Wk8Mv57cz8jC11SD6qIyCOOoC-36j7EnReTvaBKPAVtNHrvp-GGp8BkO0qNhTA">
                </form>
            </div>
            <input id="hdVC" type="hidden" value="71643a98dc3680701ad1ac0c4ff790bb">
            <input id="hdfee" type="hidden" value="no">
            <input id="hdfeeratio" type="hidden" value="0.03">
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
    $(document).ready(function() {
        $("#j-query").on("click", function() {
            var me = this;
            $(me).attr('disabled', true);
            $.ajax({
                type: "POST",
                url: '<?php echo U("cash/cash");?>',
                data: {
                    amount: $('#TikuanMoney').val(),
                    coinpwd: $('#FundsPass').val(),
                    id: $('#UserBankId').val()
                },
                dataType: "json",
                global: false,
                success: function(result) {
                    $(me).removeAttr('disabled');
                    bootbox.alert(result.info);
                },
                error: function(err) {
                    var t = err;
                }
            });
            //$("#teambetrecord").submit();
        });

    });
    </script>

	<!-- /主体 -->

	<!-- 底部 -->
	


	<!-- /底部 -->
</body>
</html>