<?php if (!defined('THINK_PATH')) exit();?><div class="clear">
</div>
<div class="tbn_top">
	<h5 id="lt_desc"><?php echo ($current_played['simpleInfo']); ?></h5>
	<span id="lt_example" class="methodexample showexample"></span>
	<span id="lt_help" class="methodhelp showexample"></span>
	<div class="clear">
	</div>
</div>
<div class="game_eg hide" id="lt_examples_div">
	<div class="cont"><?=$current_played["example"]?></div>
</div>
<div class="game_eg hide" id="lt_helps_div">
	<div class="cont"><strong>说明：</strong><br /><?=$current_played["info"]?></div>
</div>
<div class="clear">
</div>
<div class="tbn_cen">
	<div class="tbn_c_ft">
	</div>
	<div class="tbn_c_s">
		<div id="lt_selector">
			<?php  require MODULE_PATH.'View/default/Game/game-played/'.$tpl.'.html'; ?>
			<div class="c">
			</div>
		</div>
		<div id="random_sel_button" class="random_sel_button">
		</div>
		<div class="clear">
		</div>
	</div>
	<div class="tbn_c_fb">
	</div>
</div>