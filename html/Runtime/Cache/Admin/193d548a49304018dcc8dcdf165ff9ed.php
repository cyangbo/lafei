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
.popupModal table tr{
	border-bottom:#CCCCCC solid 1px;
}

.popupModal table tr td .tzdata {
	border: #CCCCCC solid 1px;
	margin-top: 5px;
	padding: 5px;
	word-wrap: break-word;
	word-break: normal;
	word-break: break-all;
	width: 98%;
	height: 80px;
	overflow: scroll;
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
	<div class="main-title">
		<h2>投注记录</h2>
	</div>
	<?php $mname=array('2.00'=>'元','0.20'=>'角','0.02'=>'分'); ?>
	<!-- 高级搜索 -->
	<form action="<?php echo U('betlog');?>" method="post">
		<div class="search-form fr cf">
			<div class="sleft">
				期号：<input style="width:100px" type="text" name="actionNo" class="search-input" value="<?php echo I('actionNo');?>" placeholder="期号">
			</div>
			<div class="sleft">
				单号：<input style="width:100px" type="text" name="wjorderId" class="search-input" value="<?php echo I('wjorderId');?>" placeholder="单号">
			</div>
			<div class="sleft">
				用户名：<input style="width:100px" type="text" name="username" class="search-input" value="<?php echo I('username');?>" placeholder="用户名">
			</div>
			<div class="sleft">
				<select style="width:100px;" name="type">
					<option value="">全部彩种</option>
					<?php if($types) foreach($types as $var){ if($var['enable'] && !$var['isDelete']){ ?>
						<option value="<?=$var['id']?>" title="<?=$var['title']?>"><?=$this->ifs($var['shortName'], $var['title'])?></option>
					<?php }} ?>
				</select>		
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
    <div class="data-table table-striped">
	<table class="">
    <thead>
        <tr>
		<th>单号</th>
		<th>用户名</th>
		<th>投注时间</th>
		<th>彩种</th>
		<th>玩法</th>
		<th>期号</th>
		<th>倍数</th>
		<th>模式</th>
		<th>投注号码</th>
		<th>投注金额</th>
		<th>中奖金额</th>
		<th>返点</th>
		<th>抽水</th>
		<th style="color:yellow">改单</th>
		<th style="color:yellow">撤单</th>
		</tr>
    </thead>
    <tbody>
		<?php if($_list): if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><a href="<?php echo U('business/betInfo?id='.$vo['id']);?>" button="确定:defaultCloseModal" title="投注信息" width="800" target="modal"><?=$vo['wjorderId']?></a></td>
			<td><a href="<?php echo U('betlog?username='.$vo['username']);?>"><?php echo ($vo["username"]); ?> </a></td>
			<td><?=date('m-d H:i:s', $vo['actionTime'])?></td>
			<td><a href="<?php echo U('betlog?type='.$types[$vo['type']]['id']);?>"> <?=$this->ifs($types[$vo['type']]['shortName'],$types[$vo['type']]['title'])?> </a></td>
			<td><?=$playeds[$vo['playedId']]['name']?></td>
			<td><?=$vo['actionNo']?></td>
			<td><?=$vo['beiShu']?></td>
			<td><?=$mname[$vo['mode']]?></td>
			<td data-code="<?=$vo['actionData']?>"><?=$this->CsubStr($vo['actionData'],0,10)?></td>
			<td><?=number_format($vo['mode'] * $vo['beiShu'] * $vo['actionNum'], 2)?></td>
			<td>
				<?php  if($vo['isDelete']==1){ echo '已撤单'; }else{ if($vo['lotteryNo']){ echo number_format($vo['zjCount'] * $vo['bonusProp'] * $vo['beiShu'] * $vo['mode']/2, 2); }else{ echo '未开奖'; } } ?>
            </td>
			<td><?=number_format($vo['mode'] * $vo['beiShu'] * $vo['actionNum'] * $vo['fanDian']/100, 2)?></td>
			<td><?=$vo['fanDianAmount']?></td>
			<td><a href="<?php echo U('business/updateBet?id='.$vo['id']);?>" button="修改:dataAddCode|取消:defaultCloseModal" title="修改投注信息" width="510" target="modal" modal="true">修改</a></td>
			<td><a href="<?php echo U('business/deleteBet?id='.$vo['id']);?>" title="是否确定撤单" width="510" target="ajax" method="get">撤单</a></td>
		
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>
			<tr>
				<td colspan="15" align="center">暂时没有投注记录。</td>
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
		$('.side-sub-menu').find('a[href="<?php echo U('business/betlog');?>"]').closest('li').addClass('current');
	</script>

</body>
</html>