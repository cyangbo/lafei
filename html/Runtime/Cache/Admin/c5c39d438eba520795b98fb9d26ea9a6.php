<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|时彩后台管理</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/blue_color.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/jquery-ui-1.8.21.custom.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
	<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="/Public/Admin/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="/Public/Admin/js/jquery-ui-1.8.23.custom.min.js"></script>
	
	<script> 
		function goToDealWithCash(){
			window.location.href = "<?php echo U('business/cash');?>";
			//$('.yw_b_2').trigger('click');
			$(this).dialog('destroy');
		}
		
		function goToDealWithRec(){
			window.location.href = "<?php echo U('business/recharge');?>";
			//$('.yw_b_2').trigger('click');
			$(this).dialog('destroy');
		}
		function defaultCloseModal(){
			$(this).dialog('destroy');
		}
	</script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <?php $__base_menu__ = $__controller__->getMenus(); ?>
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__base_menu__["main"])): $i = 0; $__LIST__ = $__base_menu__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <!-- <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li> -->
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__base_menu__); endif; ?>
                <?php if(is_array($__base_menu__["child"])): $i = 0; $__LIST__ = $__base_menu__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
	<!-- 标题栏 -->
	<div class="main-title">
		<h2>综合统计</h2>
	</div>
	
	<!-- 高级搜索 -->
	<form action="<?php echo U('datelist');?>" method="post">
		<div class="search-form fr cf">
			<div class="sleft">
				用户名：<input style="width:100px" type="text" name="username" class="search-input" value="<?php echo I('username');?>" placeholder="用户名">
			</div>
			<div class="sleft">
				时间从：<input style="width:80px" type="text" name="fromTime" id="first" class="search-input" value="<?=$this->iff(I('fromTime'),I('fromTime'),date('Y-m-d',time())) ?>" placeholder="开始时间">
			</div>
			<div class="sleft">
				到：<input style="width:80px" type="text" name="toTime" id="end" class="search-input" value="<?=$this->iff(I('toTime'),I('toTime'),date('Y-m-d',time())) ?>" placeholder="结束时间">			
			</div>
			<div class="sbtn">
				<button type="submit" class="btn" id="search">查 找</button>
			</div>	
		</div>
	</form>

	
    <!-- 数据列表 -->
    <div class="data-table table-striped" id="data-table">
	<table class="">
    <thead>
        <tr>
			<th>用户名</th>
			<th>投注总额</th>
			<th>中奖总额</th>
			<th>总返点</th>
			<th title="包括充值佣金，注册佣金，消费佣金，签到">佣金</th>
			<th>充值</th>
			<th>提现</th>
			<th>余额</th>
			<th>盈亏</th>
			
			<th>查看下级</th>
		</tr>
    </thead>
    <tbody>
		<?php if($_list): if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i; $count['betAmount']+=$var['betAmount']; $count['zjAmount']+=$var['zjAmount']; $count['fanDianAmount']+=$var['fanDianAmount']; $count['brokerageAmount']+=$var['brokerageAmount']; $count['cashAmount']+=$var['cashAmount']; $count['coin']+=$var['coin']; $count['rechargeAmount']+=$var['rechargeAmount']; ?>
		<tr>
			<td><?=$this->ifs($var['username'], '--')?></td>
			<td><?=$this->ifs($var['betAmount'], '--')?></td>
			<td><?=$this->ifs($var['zjAmount'], '--')?></td>
			<td><?=$this->ifs($var['fanDianAmount'], '--')?></td>
			<td><?=$this->ifs($var['brokerageAmount'], '--')?></td>
			<td><?=$this->ifs($var['rechargeAmount'], '--')?></td>
			<td><?=$this->ifs($var['cashAmount'], '--')?></td>
			<td><?=$this->ifs($var['coin'], '--')?></td>
			<td><?=$this->ifs($var['zjAmount']-$var['betAmount']+$var['fanDianAmount'], '--')?></td>
			
			<td>
                <?php if(!$noChildren){ ?>
                <a href="<?php echo U('Count/datelist?parentId='.$var['uid'].'&fromTime='.$para['fromTime'].'&toTime='.$para['toTime']);?>">下级</a>
				<?php } ?>
                <?php if($var['parentId']){ ?>
                <a href="<?php echo U('Count/datelist?uid='.$var['uid'].'&fromTime='.$para['fromTime'].'&toTime='.$para['toTime']);?>">上级</a>
				<?php } ?>
            </td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<tr>
			<td><span class="spn9">本页总结</span></td>
			<td><?=$this->ifs($count['betAmount'], '0')?></td>
			<td><?=$this->ifs($count['zjAmount'], '0')?></td>
			<td><?=$this->ifs($count['fanDianAmount'], '0')?></td>
            <td><?=$this->ifs($count['brokerageAmount'], '0')?></td>
			<td><?=$this->ifs($count['rechargeAmount'], '0')?></td>
			<td><?=$this->ifs($count['cashAmount'], '0')?></td>
			<td><?=$this->ifs($count['coin'], '0')?></td>
			<td><?=$this->ifs($count['zjAmount']-$count['betAmount']+$count['fanDianAmount'], '0')?></td>			
			<td></td>
		</tr>
		<tr>
			<td><span class="spn9">团队统计</span></td>
			<td><?=$this->ifs($all['betAmount2'], '--')?></td>
			<td><?=$this->ifs($all['zjAmount2'], '--')?></td>
			<td><?=$this->ifs($all['fanDianAmount2'], '--')?></td>
			<td><?=$this->ifs($all['brokerageAmount2'], '--')?></td>
			<td><?=$this->ifs($all['rechargeAmount2'], '--')?></td>
			<td><?=$this->ifs($all['cashAmount2'], '--')?></td>
			<td><?=$this->ifs($all['coin2'], '--')?></td>
			<td><?=$this->ifs($all['zjAmount2']-$all['betAmount2']+$all['fanDianAmount2']+$all['brokerageAmount2'], '--')?></td>			
			<td></td>
		</tr>
		<?php else: ?>
			<tr>
				<td colspan="10" align="center">没有统计数据了。</td>
			</tr><?php endif; ?>
	</tbody>
    </table> 
	</div>
    <div class="page">
        <?php echo ($_page); ?>
    </div>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.onethink.cn" target="_blank">OneThink</a>管理平台</div>
                
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/admin.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(".html", "")
                .replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)/, "");
            $subnav.find("a[href^='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <link href="/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
	<link href="/Public/static/datetimepicker/css/datetimepicker_blue.css" rel="stylesheet" type="text/css">
	<link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

	<script>
	$(function(){
		$('#first,#end').datetimepicker({
			format: 'yyyy-mm-dd',
			language:"zh-CN",
			minView:2,
			autoclose:true
		});
		//showTab();
	});
	</script>
	<script type="text/javascript">
		//回车搜索
		$("body").keyup(function(e){
			if(e.keyCode === 13){
				$("#search").click();
				return false;
			}
		});
		$('.side-sub-menu').find('a[href="<?php echo U('Count/datelist');?>"]').closest('li').addClass('current');
	</script>

</body>
</html>