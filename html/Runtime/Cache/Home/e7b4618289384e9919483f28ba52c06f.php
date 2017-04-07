<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<!-- saved from url=(0054)http://jsl-js.yaoxingdinshen.com/activity/openactivity -->
<!DOCTYPE html PUBLIC "" "">
<html>
<head>
<meta content="IE=11.0000" http-equiv="X-UA-Compatible">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>最新活动－<?php echo S('WEB_NAME');?></title>
<meta http-equiv="Pragma" content="no-cache">
<link href="/Public/Home/css/openactivity.css" rel="stylesheet" type="text/css">
<meta name="GENERATOR" content="MSHTML 11.00.9600.16428">
</head>
<body>
<div class="hd">
	<div class="tjbox">
		<ul class="hdtj">
			<li>
			<div>
				<img alt="" src="/Public/Home/images/activity/hd-jf.png">今日消费<strong><?php echo ($this->iff($myxf['xiaofei'], $myxf['xiaofei'], '0')); ?></strong>
			</div>
			</li>
			<li>
			<div>
				<img alt="" src="/Public/Home/images/activity/hd-lq.png">                 今日领取         
				<strong><?php echo ($this->iff($have,'已经领取','未领取')); ?></strong>
			</div>
			</li>
		</ul>
	</div>
	<div class="hdmain">
		<div class="quan">
			<p>
				领取现金券
			</p>
			<ul class="quanlist">
			<?php foreach($xiaofei as $var) { ?>
				<li data-type="<?php echo ($var["id"]); ?>">
				<div>
					满<?php echo ($var["all"]); ?>元领取
				</div>
				<strong>￥<?php echo ($var["amount"]); ?></strong><span>点击领取</span></li>
			<?php } ?>
			</ul>
		</div>
		<div class="hdinfo">
			<strong>★活动规则介绍内容★</strong>
			<div>
				<p>
					活动时间：<?php echo ($settings['activity_first_time']); ?> 至 <?php echo ($settings['activity_end_time']); ?>
				</p>
				<p>
					本次活动共设立15个现金回馈劵，全部现金劵金额共计53311元，每个现金劵限领取一次，根据每日投注 
总量计算当日最高可领取的现金劵金额，投注量统计时间为当日凌晨3点至次日凌晨3点，当日有达标的请在 
次日凌晨3点之前点击领取，超时未领取的视为放弃当日活动资格。
				</p>
			</div>
		</div>
	</div>
</div>
<script src="/Public/Home/js/jquery.min.js"></script>
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
			
            $("li[data-type]").on("click", function () {
                var v_t=$(this).attr("data-type");
                if (confirm("是否确定领取该活动金额？"))
                {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo U('activity/onxiaofei');?>",
                        data: { id: v_t },
                        dataType: "json",
                        global: false,
                        success: function (data) {
                            if (data.status) {
                                alert(data.info);
                                document.location.reload();
                            }
                            else {
                                alert(data.info);
                            }
                        },
                        error: null,
                        cache: false
                    });
                }
            });
        });
    </script>
</body>
</html>