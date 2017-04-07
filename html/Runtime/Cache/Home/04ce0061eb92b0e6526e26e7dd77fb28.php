<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<META name="renderer" content="webkit">     
<META charset="utf-8">     
<META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">     
<META name="viewport" content="width=device-width, initial-scale=1.0">  

    <title>在线充值－<?php echo S('WEB_NAME');?></title>

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

	
    <link href="/Public/Home/css/chongzhi.css" rel="stylesheet">

</head>
<body>
	
	<!-- 头部 -->
	



	<!-- /头部 -->
	
	<!-- 主体 -->
	
    <?php
 require_once("./mb/Mobaopay.Config.php"); $time = time(); $tradeDate = date("Ymd",$time); ?>
        <div class="effect mainnav-lg mainnav-fixed navbar-fixed footer-fixed" id="container">
            <div id="page-content">
                <form id="recharge" method='POST' action="<?php echo U('recharge/index');?>" role="form">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><img alt="" src="/Public/Home/images/main/cz.png">充值</h3>
                        </div>
                        <div class="panel-body chongzhibox">
                            <div class="czbox">
                                <div class="czrow">
                                    <div class="czlabel">
                                        充值方式：
                                    </div>
                                    <div class="cztxt">
                                        <div class="radio">
                                            <label class="form-radio form-normal form-text active" id="yhh">
                                                <input autocomplete="off" name="def-w-label" checked id="yh" type="radio" value='1'> 网银支付 </label>
                                            <label class="form-radio form-normal form-text" id="wxx">
                                                <input autocomplete="off" name="def-w-label" id="wx" type="radio" value='32'> 微信充值 </label>
                                            <label class="form-radio form-normal form-text" id="zfb">
                                                <input autocomplete="off" name="def-w-label" id="zfb" type="radio" value="38"> 支付宝充值 </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="czrow" id="xzyh" style="display:none;">
                                    <div class="cztxt graybg">
                                        <ul class="bankboxlist">
                                            <li>
                                                <div class="bankbox thisbank" style-name="alipayzhaoshang" min-recharge="10" max-recharge="24000">
                                                    <img alt="" src="cash_files/alipay.png">
                                                    <img alt="" src="cash_files/line.png">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="bankbox " style-name="cmbc" min-recharge="10" max-recharge="50000">
                                                    <img alt="" src="cash_files/cmbc.png">
                                                    <img alt="" src="cash_files/line.png">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="bankbox " style-name="weixin" min-recharge="10" max-recharge="500">
                                                    <img alt="" src="cash_files/weixin.png">
                                                    <img alt="" src="cash_files/line.png">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="czrow" id="xzfs" style="display: none;">
                                    <div class="cztxt graybg">
                                        <ul class="bankboxlist">
                                            <li>
                                                <div class="bankbox " style-name="thk" min-recharge="10" max-recharge="100000">
                                                    <img class="bankselect" alt="" src="cash_files/chongzhilabbg.jpg">
                                                    <img alt="" src="cash_files/line.png"><span>A通汇</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="bankbox " style-name="newpay" min-recharge="10" max-recharge="50000">
                                                    <img class="bankselect" alt="" src="cash_files/chongzhilabbg.jpg">
                                                    <img alt="" src="cash_files/line.png"><span>C新生</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="czrow">
                                    <div class="czlabel">
                                        充值金额：
                                    </div>
                                    <div class="cztxt">
                                        <div class="jinebox">
                                            <input name="StyleName" id="StyleName" type="hidden" value="alipayzhaoshang ">
                                            <input name="amount" id="amt" type="text" placeholder="请输入充值金额" value="" data-val-required="RechargeMoney 字段是必需的。" data-val-number="The field RechargeMoney must be a number." data-val="true"> 元
                                        </div>
                                        充值金额：<strong>单笔最低充值金额为<span id="txtminmoney"><?php echo ($settings["rechargeMin1"]); ?></span>元，最高<span id="txtmaxmoney"><?php echo ($settings["rechargeMax1"]); ?></span>元</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="czfoot">
                                <div class="czfootbox">
                                    <button class="btn btn-primary" autocomplete="off" type="submit" onclick="return fukuan(this);">
                                        继续下一步
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input size="50" type="hidden" name="orderNo" id="orderNo" value='<?php echo ($orderNo); ?>' />
                    <input size="50" type="hidden" name="tradeDate" id="tradeDate" value='<?php echo $tradeDate; ?>' />
                    <input size="50" type="hidden" name="merchParam" id="merchParam" value="<?php echo ($user["uid"]); ?>" />
                    <input size="50" type="hidden" name="tradeSummary" id="tradeSummary" value="<?php echo ($user["username"]); ?>" />
                </form>
            </div>
        </div>
        <div style="display:none">
            <form method="post" id="MerOrder" action="/tfk3/paySubmit.php" href="#" target="_blank">
                <input name="p2_Order" id="p2_Order" value="" type="hidden">
                <input name="p3_Amt" id="p3_Amt" value="" type="hidden">
                <input name="pa_MP" id="pa_MP" value="a15909835" type="hidden">
                <p>
                    <input type="submit" id="postbtn" name="submit" value="智付在线支付" />
                </p>
            </form>
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

	
    <script src="/Public/Home/js/bootbox.min.js"></script>
    <script type="text/javascript">
        function fukuan(me) {

            var min = {
                $settings.rechargeMin1
            };
            var max = {
                $settings.rechargeMax1
            };
            var amount = parseFloat($('#amt').val());
            if (isNaN(amount) || amount < min || amount > max) {
                bootbox.alert('充值金额必须在' + min + '元和' + max + '元之间');
                return false;
            }

            if ($('#yhh').hasClass('active') == true) {
                $('#MerOrder').attr('action', '/tfk3/paySubmit.php');
            } else {
                $('#MerOrder').attr('action', '/tfk3/paySubmit.php');
            }

            $(me).attr('disabled', true);
            $(me).text('正在转接。。');

            var url = '/index.php?s=/home/recharge/index.html';
            $.post(url, {
                amount: $('#amt').val()
            }, function(result) {
                $(me).attr('disabled', false);
                $(me).text('继续下一步');

                $('#p2_Order').val(result.rechargeId);
                $('#p3_Amt').val(amount);
                //$('#MerOrder').submit();
                $('#postbtn').click();
            });
            return false;
        }
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

        function checkmoney() {
            var min = {
                $settings.rechargeMin1
            };
            var max = {
                $settings.rechargeMax1
            };
            var amount = parseFloat($('#amt').val());
            if (isNaN(amount) || amount < min || amount > max) {
                bootbox.alert('充值金额必须在' + min + '元和' + max + '元之间');
                return false;
            }
        }
    </script>

	<!-- /主体 -->

	<!-- 底部 -->
	


	<!-- /底部 -->
</body>
</html>