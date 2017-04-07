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
    
<style>
.module {
	border: 1px solid #9BA0AF;
	margin: 20px 3% 0 3%;
	margin-top: 20px;
	background: #fff;
	border-radius: 5px;
	display:block;
	height:100%;
	overflow:hidden; 
}

.tabs_involved {
	border: 1px solid #dddddd;
	border-radius: 5px;
	float: left;
	line-height: 32px;
	color: #1F1F20;
	font-size: 13px;
	margin: 0px 0px;
	width:100%;
	background: #eee;
}

.stats_overview {

	float: right;
	width: 60%;

}

.overview_today, .overview_previous {
	width: 25%;
	float: left;
	display: block;
}

.stats_overview p.overview_count {
	font-size: 22px;
	font-weight: bold;
	color: #333;
}

.module .module_content {
	text-transform: none;
	text-shadow: 0 1px 0 #fff;
	margin: 38px 20px;
	display:block;
}

.module .module_content .cztz {
	width: 23%;
	height: 32px;
	line-height: 30px;
	float: left;
	display:block;
}

.tablesorter {
	width: 95%;
	margin: 0px 0 0 0;
	text-align:center;
}
</style>

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
	
	<div class="module">
		<header><h3 class="tabs_involved">盈亏统计</h3></header>
		<!--<div style="margin-left:50px; width:40%; float:right;">
			<table align="center" style="text-align:center">
				<thead>
				<tr>
					<td height="24">月份</td><td>投注金额</td><td>盈亏</td>
				</tr>
				</thead>
				<tbody>
				<?php if(is_array($dataMonth)): $i = 0; $__LIST__ = $dataMonth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td height="24"><?php echo ($vo["monthName"]); ?></td><td><?php echo intval($vo['betAmount']);?></td><td><?php echo intval($vo['winAmount']);?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>-->
		<div class="stats_overview" style="margin:10px;">
			<?php $data=$todayData; $jtTCount=number_format($data['betAmount']-$data['zjAmount']-$data['fanDianAmount']-$data['brokerageAmount'],2); $jtYKCount=number_format($data['betAmount'],2); if($jtTCount>0){ $jtTCount="<span style='color:#F00'>".$jtTCount."</span>"; }else if($jtTCount<0){ $jtTCount="<span style='color:#060'>-".abs($jtTCount)."</span>"; }else{ $jtTCount=$jtTCount; } ?>
			<div class="overview_today">
				<p class="overview_day">今日统计</p>
				<p class="overview_count"><?=$jtTCount?></p>
				<p class="overview_type">盈亏</p>
				<p class="overview_count"><?=$jtYKCount?></p>
				<p class="overview_type">投注额</p>
			</div>
			<?php  $data=$yestodayData; $ztTCount=number_format($data['betAmount']-$data['zjAmount']-$data['fanDianAmount']-$data['brokerageAmount'],2); $ztYKCount=number_format($data['betAmount'],2); if($ztTCount>0){ $ztTCount="<span style='color:#F00'>".$ztTCount."</span>"; }else if($ztTCount<0){ $ztTCount="<span style='color:#060'>-".abs($ztTCount)."</span>"; }else{ $ztTCount=$ztTCount; } ?>
			<div class="overview_previous">
				<p class="overview_day">昨日统计</p>
				<p class="overview_count"><?=$ztTCount?></p>
				<p class="overview_type">盈亏</p>
				<p class="overview_count"><?=$ztYKCount?></p>
				<p class="overview_type">投注额</p>
			</div>
		</div>
	</div>
	
	
	<!--<div class="module">
		<header><h3 class="tabs_involved">彩种投注金额统计<span class="spn1">（彩种名称：投注金额）</span></h3></header>
		<div class="module_content">
			<?php
 $list=M('bets')->where(array('lotteryNo'=>array('neq','')))->field('type, sum(beiShu*mode*actionNum*(fpEnable+1)) amount')->group('type')->select(); $data=array(); if($list) foreach($list as $var){ $data[$var['type']]=$var; } if($types) foreach($types as $var){ if($var['isDelete']==0 && $var['enable']==1){ ?>
			<div class="cztz"><span class="title"><?=$var['title']?></span><span class="spn2">￥<?=number_format($this->ifs($data[$var['id']]['amount'], 0),2)?></span></div>
			<?php }} ?>
		</div>
	</div>-->
    
	<!--<div class="module">
		<header><h3 class="tabs_involved">玩法统计<span class="spn1">（玩法统计：投注金额 / 注数）</span></h3></header>
		<div class="module_content">
		<?php
 $list=M('bets')->where(array('lotteryNo'=>array('neq','')))->field('playedId, sum(beiShu*mode*actionNum*(fpEnable+1)) amount,sum(actionNum) actionNumA')->group('playedId')->select(); $data=array(); if($list) foreach($list as $var){ $data[$var['playedId']]=$var; } if($playeds) foreach($playeds as $var){ ?>
			<div class="cztz"><span class="title"><?=$var['name']?></span><span class="spn2">￥<?=number_format($this->ifs($data[$var['id']]['amount'], 0),2)?> / <?=$this->ifs($data[$var['id']]['actionNumA'], 0)?>注</span></div>
		<?php } ?>
		</div>
	</div>
	
	
	<?php
 $Members = M('members'); $date=strtotime(date("Y-m-d",time())." 00:00:00"); $data=$Members->where(array('isDelete'=>0))->field('count(uid) allUser, sum(regTime>='.$date.') todayReg, sum(type) dlCount, sum(type=0) memberCount, sum(coin+fcoin) amountCount')->find(); $uids = $Members->where(array('admin'=>0))->field('uid')->select(); foreach($uids as $u) { $str = $str.$u['uid'].','; } $map = array(); $map['isOnLine']=1; $map['uid'] = array('in',$str); $map['accessTime'] = array('gt',time()-C('SESSION_TIME')); $count = M('member_session')->where($map)->field('count(distinct uid) as count')->find(); ?>
	<div class="module">
		<header><h3 class="tabs_involved">用户统计</h3></header>
		<table class="tablesorter" cellspacing="0"> 
		<thead> 
			<tr> 
				<th>用户总数</th> 
				<th>今日注册人数</th> 
				<th>代理人数</th> 
				<th>会员人数</th> 
				<th>当前在线人数</th>
				<th>余额总数</th>
			</tr> 
		</thead> 
		<tbody> 
			<tr> 
				<td><?=$data['allUser']?></td> 
				<td><?=$data['todayReg']?></td> 
				<td><?=$data['dlCount']?></td> 
				<td><?=$data['memberCount']?></td> 
				<td><?=$count['count'] ?></td> 
				<td><?=number_format($data['amountCount'])?></td> 
			</tr> 
		</tbody> 
		</table>
	</div>-->

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
    
    

</body>
</html>