<?php if (!defined('THINK_PATH')) exit(); if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="pro-view-13" class="w-record m-winRecord-revealed">
<div class="w-goods w-goods-l w-goods-ing m-user-goods">
	<div class="w-goods-info">
		<p>
			第 <?php echo ($vo["number"]); ?> 期 
		</p>
		<p>
			<ul class="kjhao">
			<?php $kjHao=explode(',', $vo['data']); foreach($kjHao as $var){ ?>
					<li><?php echo ($var); ?></li>									
			<?php } ?>
			</ul>
		</p>
	</div>
</div>
<script>lid="<?php echo ($vo['id']); ?>";</script>
</li><?php endforeach; endif; else: echo "" ;endif; ?>