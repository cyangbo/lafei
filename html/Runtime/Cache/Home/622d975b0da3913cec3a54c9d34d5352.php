<?php if (!defined('THINK_PATH')) exit(); $id = I('id'); $issuecount = I('issuecount'); $wday = I('wday'); $starttime = I('starttime'); $endtime = I('endtime'); if ($id == '') { $id = 1; } if ($issuecount >= 30) { $rs = M('data')->where(array('type' => $id))->order('time desc')->limit($issuecount)->select(); $total = count($rs); } if (!empty($starttime) || !empty($endtime)) { $starttime = strtotime($starttime . ' 00:00:00'); $endtime = strtotime($endtime . ' 23:59:59'); $rs = M('data')->where(array('type' => $id, 'time' => array('between', array($starttime, $endtime))))->order('number desc')->select(); $total = count($rs); } if ($wday == 'b' || $wday == 'y' || $wday == 't') { if ($wday == 'b') { $starttime = strtotime(date('Y-m-d 00:00:00', time() - 24 * 60 * 60 * 2)); $endtime = strtotime(date('Y-m-d 23:59:59', time() - 24 * 60 * 60 * 2)); } if ($wday == 'y') { $starttime = strtotime(date('Y-m-d 00:00:00', time() - 24 * 60 * 60)); $endtime = strtotime(date('Y-m-d 23:59:59', time() - 24 * 60 * 60)); } if ($wday == 't') { $starttime = strtotime(date('Y-m-d 00:00:00', time())); $endtime = strtotime(date('Y-m-d 23:59:59', time())); } $rs = M('data')->where(array('type' => $id, 'time' => array('between', array($starttime, $endtime))))->order('number desc')->select(); $total = count($rs); } if ($id == 1 || $id == 3 || id == 12 || $id == 14 || $id == 34||$id==36) { $ns = 5; $nts = 50; $ntx = 0; $ntd = 9; $ntn = 10; } else { if ($id == 10 || $id == 9) { $ns = 3; $nts = 30; $ntx = 0; $ntd = 9; $ntn = 10; } else { if ($id == 6 || $id == 15 || $id == 15) { $ns = 5; $nts = 55; $ntx = 1; $ntd = 11; $ntn = 11; } } } ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0074)http://game.cg070.net/history_code.shtml?id=1&issuecount=3&frequencytype=0 -->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:esun=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo S('WEB_NAME');?> - 遗漏分析</title>
    
    <meta http-equiv="Pragma" content="no-cache">
        <script type="text/javascript" async="" src="/Public/Home/images/zoushitu_files/ga.js"></script><script>var pri_imgserver = 'http://img.cg070.net';</script>
        <link href="/Public/Home/images/zoushitu_files/all.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/images/zoushitu_files/calendar-blue2.css" rel="stylesheet" type="text/css">
    <script language="javascript" type="text/javascript" src="/Public/Home/images/zoushitu_files/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="/Public/Home/images/zoushitu_files/common.js"></script>
    <script language="javascript" type="text/javascript" src="/Public/Home/images/zoushitu_files/message.js"></script>
    <script language="javascript" type="text/javascript" src="/Public/Home/images/zoushitu_files/jquery.dyndatetime.js"></script>
    <script language="javascript" type="text/javascript" src="/Public/Home/images/zoushitu_files/calendar-utf8.js"></script>
    <script language="javascript" type="text/javascript" src="/Public/Home/images/zoushitu_files/line.js"></script>
        <script language="JavaScript">function ResumeError() {return true;} window.onerror = ResumeError; </script> 
</head>
<body>
<div id="rightcon">
<script language="javascript">
    fw.onReady(function(){
        if($("#chartsTable").width()>$('body').width()){
            $('body').width(($("#chartsTable").width()+30) + "px");
            $('.history_code').css("width",$("#chartsTable").width()+"px");
            $('#copyright').css("width",$("#chartsTable").width()+"px");
        }
        Chart.init();	
        DrawLine.bind("chartsTable","has_line");

                DrawLine.color('#FFAAAA');
        DrawLine.add((parseInt(0)*10+5+1),2,10,0);
                DrawLine.color('#B9B9FF');
        DrawLine.add((parseInt(1)*10+5+1),2,10,0);
                DrawLine.color('#FFAAAA');
        DrawLine.add((parseInt(2)*10+5+1),2,10,0);
                DrawLine.color('#B9B9FF');
        DrawLine.add((parseInt(3)*10+5+1),2,10,0);
                DrawLine.color('#FFAAAA');
        DrawLine.add((parseInt(4)*10+5+1),2,10,0);
                DrawLine.draw(Chart.ini.default_has_line);
        resize();
        jQuery("#starttime").dynDateTime({
            ifFormat: "%Y-%m-%d",
            daFormat: "%l;%M %p, %e %m,  %Y",
            align: "Br",
            electric: true,
            singleClick: true,
            button: ".next()", //next sibling
            onUpdate:function(){
                $("#starttime").change();
            },
            showOthers: true,
            weekNumbers: true,
            showsTime: false
        });
        jQuery("#starttime").change(function(){
            if(! validateInputDate(jQuery("#starttime").val()) )
            {
                jQuery("#starttime").val('');
                $.alert("日期格式不正确,正确的格式为:2011-01-01");
            }
            if($("#endtime").val()!="")
            {
                if($("#starttime").val()>$("#endtime").val())
                {
                    $("#starttime").val("");
                    $.alert("输入的时间不符合逻辑, 起始时间大于结束时间");
                }
                else
                {
                    if(daysBetween($("#starttime").val(),$("#endtime").val()) > 1)
                    {
                        $("#starttime").val("");
                        $.alert("输入的时间跨度不能超过2天！");
                    }
                }
            }
        });
        jQuery("#endtime").dynDateTime({
            ifFormat: "%Y-%m-%d",
            daFormat: "%l;%M %p, %e %m,  %Y",
            align: "Br",
            electric: true,
            singleClick: true,
            button: ".next()", //next sibling
            onUpdate:function(){
                $("#endtime").change();
            },
            showOthers: true,
            weekNumbers: true,
            showsTime: false
        });
        jQuery("#endtime").change(function(){
            if(! validateInputDate(jQuery("#endtime").val()) )
            {
                jQuery("#endtime").val('');
                $.alert("日期格式不正确,正确的格式为:2011-01-01");
            }
            if($("#starttime").val()!="")
            {
                if($("#starttime").val()>$("#endtime").val())
                {
                    $("#endtime").val("");
                    $.alert("输入的时间不符合逻辑, 起始时间大于结束时间");
                }
                else
                {
                    if(daysBetween($("#starttime").val(),$("#endtime").val()) > 1)
                    {
                        $("#endtime").val("");
                        $.alert("输入的时间跨度不能超过2天！");
                    }
                }
            }
        });
        var nols = $("div[class^='ball1']");
        $("#no_miss").click(function(){
            var checked = $(this).attr("checked");
            $.each(nols,function(i,n){
                if(checked==true){
                    n.style.display='none';
                }else{
                    n.style.display='block';
                }
            });
        });
    });
    function resize(){
        window.onresize = func;
        function func(){
            window.location.href=window.location.href;
        }
    }
    function daysBetween(start, end){
        var startY = start.substring(0, start.indexOf('-'));
        var startM = start.substring(start.indexOf('-')+1, start.lastIndexOf('-'));
        var startD = start.substring(start.lastIndexOf('-')+1, start.length);
  
        var endY = end.substring(0, end.indexOf('-'));
        var endM = end.substring(end.indexOf('-')+1, end.lastIndexOf('-'));
        var endD = end.substring(end.lastIndexOf('-')+1, end.length);
  
        var val = (Date.parse(endY+'/'+endM+'/'+endD)-Date.parse(startY+'/'+startM+'/'+startD))/86400000;
        return Math.abs(val);
    }
</script>
<style>
    esun\:*{behavior:url(#default#VML)}
</style>
<div class="rc_con history">
    <div class="rc_con_lt"></div>
    <div class="rc_con_rt"></div>
    <div class="rc_con_lb"></div>
    <div class="rc_con_rb"></div>
    <h5><div class="rc_con_title">遗漏分析</div></h5>
    <div class="rc_con_to">
        <div class="rc_con_ti">
            <div class="history_code">
                <table width="100%" id="tm" border="0" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td align="left" width="200">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <strong>
                                <font color="#FF0000">彩票：</font>
                                基本走势
                            </strong>
                        </td>
                        <td align="left">
                            <form method="POST">
                                <span>
                                    <label for="has_line">
                                        <input type="checkbox" name="checkbox2" value="checkbox" id="has_line">显示折线
                                    </label>
                                </span>&nbsp;
                                <span>
                                    <label for="no_miss">
                                        <input type="checkbox" name="checkbox" value="checkbox" id="no_miss">不带遗漏
                                    </label>
                                </span>&nbsp;&nbsp;&nbsp;
                                                                <a href="<?php echo U('game/zoushitu?id='.$id.'&issuecount=30');?>">最近30期</a>&nbsp;
                                <a href="<?php echo U('game/zoushitu?id='.$id.'&issuecount=50');?>">最近50期</a>&nbsp;
                                <a href="<?php echo U('game/zoushitu?id='.$id.'&issuecount=100');?>">最近100期</a>&nbsp;
                                <a href="<?php echo U('game/zoushitu?id='.$id.'&wday=b');?>">前天</a>&nbsp;
                                <a href="<?php echo U('game/zoushitu?id='.$id.'&wday=y');?>">昨天</a>&nbsp;
                                <a href="<?php echo U('game/zoushitu?id='.$id.'&wday=t');?>">今天</a>&nbsp;
                                                                <input class="in" type="text" value="" name="starttime" id="starttime">
                                <img class="icons_mb4" src="/Public/Home/images/zoushitu_files/icon.png" style="vertical-align:middle;">
                                &nbsp;至&nbsp;
                                <input class="in" type="text" value="" name="endtime" id="endtime">
                                <img class="icons_mb4" src="/Public/Home/images/zoushitu_files/icon.png" style="vertical-align:middle;">&nbsp;&nbsp;
                                <input type="submit" value="搜索">&nbsp;&nbsp;&nbsp;
                            </form>
                        </td>
                    </tr>
                </tbody></table>
            </div>
            <div class="hrc_list">
                <div class="hrl_list">
                    <table id="chartsTable" width="100%" border="0" cellpadding="0" cellspacing="1">
                        <tbody><tr class="th">
                            <td rowspan="2">期号</td>
                            <td rowspan="2" colspan="5">开奖号码</td>
                                                        <td colspan="<?php  echo $ntn; ?>
">万位</td>
                                                        <td colspan="<?php  echo $ntn; ?>
">千位</td>
                                                        <td colspan="<?php  echo $ntn; ?>
">百位</td>
                                                        <td colspan="<?php  echo $ntn; ?>
">十位</td>
                                                        <td colspan="<?php  echo $ntn; ?>
">个位</td>
                                                    </tr>
                        <tr class='th'>
							<?php  for ($i = 0; $i < $ns; $i++) { for ($ii = $ntx; $ii <= $ntd; $ii++) { ?>
											<td class="wdh"><?php  echo $ii; ?>
</td>
							<?php  } } ?>
						</tr>
												
							<?php  for ($i = 0; $i <= $nts; $i++) { $s[$i] = 0; $a[$i] = 0; $b[$i] = 0; $c[$i] = 0; $d[$i] = 0; } foreach ($rs as $row) { $na = array(); $na2 = array(); $na2 = explode(',', $row['data']); $na[1] = $na2[0]; $na[2] = $na2[1]; $na[3] = $na2[2]; $na[4] = $na2[3]; $na[5] = $na2[4]; for ($i = 0; $i <= $nts; $i++) { $a[$i] = $a[$i] + 1; $c[$i] = $c[$i] + 1; if ($b[$i] < $a[$i]) { $b[$i] = $a[$i]; } if ($d[$i] < $c[$i]) { $d[$i] = $c[$i]; } } ?>
                            <td class="issue"><?php  echo substr($row['number'], 4); ?>
</td>
                                                        <td align="center" width="28"><div class="wth"><?php  echo $na[1]; ?>
</div></td>
                                                        <td align="center" width="28"><div class="wth"><?php  echo $na[2]; ?>
</div></td>
                                                        <td align="center" width="28"><div class="wth"><?php  echo $na[3]; ?>
</div></td>
													<?php  if ($id != 10 && $id != 9) { ?>
                                                        <td align="center" width="28"><div class="wth"><?php  echo $na[4]; ?>
</div></td>
                                                        <td align="center" width="28"><div class="wth"><?php  echo $na[5]; ?>
</div></td>
													<?php  } ?>
                            
							<?php  $iii = 0; for ($i = 0; $i < $ns; $i++) { for ($ii = $ntx; $ii <= $ntd; $ii++) { $iii = $iii + 1; ?>
							
											<?php  if ($na[$i + 1] == $ii) { echo "<td class='charball td<?=<?php echo ($i); ?>%2?>' align='center'><div class='ball0" . ($i % 2 + 1) . '\'>' . $na[$i + 1] . '</div>'; $a[$iii] = 0; $s[$iii] = $s[$iii] + 1; } else { echo "<td class='wdh td<?=<?php echo ($i); ?>%2?>' align='center'><div class='ball13'>" . $a[$iii] . '</div>'; $c[$iii] = 0; } ?>
</td>
							<?php  } } ?>
										</tr>
							 <?php  } ?>
                            
                                                
                                                
                                    
                                                
                                               
                                                
                        
							<tr class=tb>
								<td nowrap>出现总次数</td>
								<td align="center" colspan="<?php  echo $ns; ?>
">&nbsp;</td>
								<?php  for ($i = 1; $i <= $nts; $i++) { ?>
										<td align="center"><?php  echo $s[$i]; ?>
</td>
								<?php  } ?>
									</tr>
									<tr class=tb>
										<td nowrap>平均遗漏值</td>
										<td align="center" colspan="<?php  echo $ns; ?>
">&nbsp;</td>
								<?php  for ($i = 1; $i <= $nts; $i++) { if ($s[$i] == 0) { $av = $total; } else { $av = intval($total / $s[$i]); } ?>
										<td align="center"><?php  echo $av; ?>
</td>
								<?php  } ?>
									</tr>
									<tr class=tb>
										<td nowrap>最大遗漏值</td>
										<td align="center" colspan="<?php  echo $ns; ?>
">&nbsp;</td>
								<?php  for ($i = 1; $i <= $nts; $i++) { if ($b[$i] - 1 < $a[$i]) { $bv = $a[$i]; } else { $bv = $b[$i] - 1; } ?>
										<td align="center"><?php  echo $bv; ?>
</td>
								<?php  } ?>
							</tr>

		<tr class=tb>
			<td nowrap>最大连出值</td>
			<td align="center" colspan="<?php  echo $ns; ?>
">&nbsp;</td>
	<?php  for ($i = 1; $i <= $nts; $i++) { if ($d[$i] - 1 < $c[$i]) { $dv = $c[$i]; } else { $dv = $d[$i] - 1; } ?>
			<td align="center"><?php  echo $dv; ?>
</td>
	<?php  } ?>
		</tr>

                        <tr class="th">
                            <td rowspan="2">期号</td>
                            <td rowspan="2" colspan="5">开奖号码</td>
                                                                                    <td>0</td>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>5</td>
                                                        <td>6</td>
                                                        <td>7</td>
                                                        <td>8</td>
                                                        <td>9</td>
                                                                                                                <td>0</td>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>5</td>
                                                        <td>6</td>
                                                        <td>7</td>
                                                        <td>8</td>
                                                        <td>9</td>
                                                                                                                <td>0</td>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>5</td>
                                                        <td>6</td>
                                                        <td>7</td>
                                                        <td>8</td>
                                                        <td>9</td>
                                                                                                                <td>0</td>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>5</td>
                                                        <td>6</td>
                                                        <td>7</td>
                                                        <td>8</td>
                                                        <td>9</td>
                                                                                                                <td>0</td>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>5</td>
                                                        <td>6</td>
                                                        <td>7</td>
                                                        <td>8</td>
                                                        <td>9</td>
                                                                                </tr>
                        <tr class="th">
                                                        <td colspan="<?php  echo $ntn; ?>
">万位</td>
                                                        <td colspan="<?php  echo $ntn; ?>
">千位</td>
                                                        <td colspan="<?php  echo $ntn; ?>
">百位</td>
                                                        <td colspan="<?php  echo $ntn; ?>
">十位</td>
                                                        <td colspan="<?php  echo $ntn; ?>
">个位</td>
                                                 
                        </tr>
                    </tbody></table>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="copyright">
        <p>浏览器建议：首选IE 8.0,Chrome浏览器，其次为火狐浏览器,尽量不要使用IE6。</p>
    </div>
</div>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36352852-1']);
    _gaq.push(['_trackPageview']);
    (function() {
        var hidenotice = getCookie("hidenotice");
        if(hidenotice != 1){
            var $bn = $("#bonusnotice",window.top.document);
            var $mainbox = $("#mainbox",window.top.document);
            var $leftbox = $("#leftbox",window.top.document);
            $mainbox.height($leftbox.height()-35);
            $bn.css("height","35px");
        }
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

<canvas width="15" height="14" style="position: absolute; visibility: visible; top: 180px; left: 325px;"></canvas><canvas width="15" height="14" style="position: absolute; visibility: visible; top: 206px; left: 352px;"></canvas><canvas width="15" height="14" style="position: absolute; visibility: visible; top: 232px; left: 352px;"></canvas><canvas width="105" height="22" style="position: absolute; visibility: visible; top: 254px; left: 233px;"></canvas><canvas width="172" height="24" style="position: absolute; visibility: visible; top: 279px; left: 233px;"></canvas><canvas width="118" height="22" style="position: absolute; visibility: visible; top: 306px; left: 287px;"></canvas><canvas width="26" height="18" style="position: absolute; visibility: visible; top: 334px; left: 286px;"></canvas><canvas width="53" height="20" style="position: absolute; visibility: visible; top: 359px; left: 259px;"></canvas><canvas width="78" height="22" style="position: absolute; visibility: visible; top: 384px; left: 260px;"></canvas><canvas width="105" height="22" style="position: absolute; visibility: visible; top: 176px; left: 501px;"></canvas><canvas width="15" height="14" style="position: absolute; visibility: visible; top: 206px; left: 620px;"></canvas><canvas width="40" height="20" style="position: absolute; visibility: visible; top: 229px; left: 594px;"></canvas><canvas width="15" height="14" style="position: absolute; visibility: visible; top: 258px; left: 593px;"></canvas><canvas width="145" height="24" style="position: absolute; visibility: visible; top: 279px; left: 461px;"></canvas><canvas width="53" height="20" style="position: absolute; visibility: visible; top: 307px; left: 460px;"></canvas><canvas width="15" height="14" style="position: absolute; visibility: visible; top: 336px; left: 526px;"></canvas><canvas width="78" height="22" style="position: absolute; visibility: visible; top: 358px; left: 555px;"></canvas><canvas width="40" height="20" style="position: absolute; visibility: visible; top: 385px; left: 594px;"></canvas><canvas width="2" height="10" style="position: absolute; visibility: visible; top: 182px; left: 734px;"></canvas><canvas width="90" height="22" style="position: absolute; visibility: visible; top: 202px; left: 742px;"></canvas><canvas width="90" height="22" style="position: absolute; visibility: visible; top: 228px; left: 742px;"></canvas><canvas width="26" height="18" style="position: absolute; visibility: visible; top: 256px; left: 701px;"></canvas><canvas width="2" height="10" style="position: absolute; visibility: visible; top: 286px; left: 694px;"></canvas><canvas width="90" height="22" style="position: absolute; visibility: visible; top: 306px; left: 702px;"></canvas><canvas width="90" height="22" style="position: absolute; visibility: visible; top: 332px; left: 702px;"></canvas><canvas width="90" height="22" style="position: absolute; visibility: visible; top: 358px; left: 702px;"></canvas><canvas width="2" height="10" style="position: absolute; visibility: visible; top: 390px; left: 800px;"></canvas><canvas width="53" height="20" style="position: absolute; visibility: visible; top: 177px; left: 874px;"></canvas><canvas width="172" height="24" style="position: absolute; visibility: visible; top: 201px; left: 875px;"></canvas><canvas width="78" height="22" style="position: absolute; visibility: visible; top: 228px; left: 969px;"></canvas><canvas width="53" height="20" style="position: absolute; visibility: visible; top: 255px; left: 901px;"></canvas><canvas width="91" height="22" style="position: absolute; visibility: visible; top: 280px; left: 902px;"></canvas><canvas width="118" height="22" style="position: absolute; visibility: visible; top: 306px; left: 875px;"></canvas><canvas width="145" height="24" style="position: absolute; visibility: visible; top: 331px; left: 875px;"></canvas><canvas width="53" height="20" style="position: absolute; visibility: visible; top: 359px; left: 968px;"></canvas><canvas width="53" height="20" style="position: absolute; visibility: visible; top: 385px; left: 901px;"></canvas><canvas width="42" height="20" style="position: absolute; visibility: visible; top: 177px; left: 1213px;"></canvas><canvas width="2" height="10" style="position: absolute; visibility: visible; top: 208px; left: 1206px;"></canvas><canvas width="2" height="10" style="position: absolute; visibility: visible; top: 234px; left: 1206px;"></canvas><canvas width="82" height="22" style="position: absolute; visibility: visible; top: 254px; left: 1116px;"></canvas><canvas width="82" height="22" style="position: absolute; visibility: visible; top: 280px; left: 1116px;"></canvas><canvas width="42" height="20" style="position: absolute; visibility: visible; top: 307px; left: 1213px;"></canvas><canvas width="16" height="16" style="position: absolute; visibility: visible; top: 335px; left: 1240px;"></canvas><canvas width="82" height="22" style="position: absolute; visibility: visible; top: 358px; left: 1144px;"></canvas><canvas width="82" height="22" style="position: absolute; visibility: visible; top: 384px; left: 1144px;"></canvas></body></html>