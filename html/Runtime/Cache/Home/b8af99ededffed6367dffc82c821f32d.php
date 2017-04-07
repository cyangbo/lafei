<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<META name="renderer" content="webkit">     
<META charset="utf-8">     
<META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">     
<META name="viewport" content="width=device-width, initial-scale=1.0">  

    <title>在线充值－<?php echo S('WEB_NAME');?></title>

<link href="/lafei/html/Public/Home/css/bootstrap.min.css" rel="stylesheet">
<link href="/lafei/html/Public/Home/css/nifty.min.css" rel="stylesheet">
<link href="/lafei/html/Public/Home/css/font-awesome.min.css" rel="stylesheet">
<link href="/lafei/html/Public/Home/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="/lafei/html/Public/Home/css/switchery.min.css" rel="stylesheet">
<link href="/lafei/html/Public/Home/css/css.min.css" rel="stylesheet">
<link href="/lafei/html/Public/Home/css/withdraw.css" rel="stylesheet">
<link href="/lafei/html/Public/Home/css/comm.min.css" rel="stylesheet">
<link href="/lafei/html/Public/Home/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="/lafei/html/Public/Home/css/dataTables.responsive.min.css" rel="stylesheet">

<meta name="GENERATOR" content="MSHTML 11.00.9600.16428">

<!-- IE浏览器时需要以下js支持 -->

<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

	
</head>
<body>
	
	<!-- 头部 -->
	



	<!-- /头部 -->
	
	<!-- 主体 -->
	


	

<script src="/lafei/html/Public/Home/js/jquery.min.js"></script>
<script src="/lafei/html/Public/Home/js/bootstrap.min.js"></script>
<script src="/lafei/html/Public/Home/js/bootstrap-datetimepicker.min.js"></script>
<script src="/lafei/html/Public/Home/js/bootstrap-datetimepicker.zh-CN.min.js"></script>
<script src="/lafei/html/Public/Home/js/nifty.min.js"></script>
<script src="/lafei/html/Public/Home/js/switchery.min.js"></script>
<script src="/lafei/html/Public/Home/js/md5.min.js"></script>
<script src="/lafei/html/Public/Home/js/common.min.js"></script>
<script src="/lafei/html/Public/Home/js/dataTables.min.js"></script>
<script src="/lafei/html/Public/Home/js/dataTables.bootstrap.min.js"></script>
<script src="/lafei/html/Public/Home/js/dataTables.responsive.min.js"></script>
<script src="/lafei/html/Public/Home/js/bootbox.min.js"></script>
<script src="/lafei/html/Public/Home/js/jquery.nouislider.all.min.js"></script>

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

	


	<!-- /主体 -->

	<!-- 底部 -->
	


	<!-- /底部 -->
</body>
</html>