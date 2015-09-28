<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:35:09
         compiled from "./templates/open_shop_buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34207752156086f1da9c007-14434720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a66d0e285d415e8379be5e848c5218323210198e' => 
    array (
      0 => './templates/open_shop_buttons.tpl',
      1 => 1414263785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34207752156086f1da9c007-14434720',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isOpenShop' => 0,
    'close_ask' => 0,
    'confirm' => 0,
    'cancel' => 0,
    'close' => 0,
    'open_ask' => 0,
    'open' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086f1dad4bd7_82492778',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086f1dad4bd7_82492778')) {function content_56086f1dad4bd7_82492778($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['isOpenShop']->value=="true") {?>
<div class="prompt" onclick="closePopUp();">
	<div class="confirmation">
		<p>
			<?php echo $_smarty_tpl->tpl_vars['close_ask']->value;?>

		</p>
		<span class="icon-circle-check button confirm"><?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
</span>
		<span class="icon-circle-cross button cancel"><?php echo $_smarty_tpl->tpl_vars['cancel']->value;?>
</span>
	</div>
</div>
<div class="close_shop">
	<form method="post" action="shop.php" name="session_starter">
		<input type="hidden" name="shop_action" value="close">
		<input type="submit" name="start" value="<?php echo $_smarty_tpl->tpl_vars['close']->value;?>
">
	</form>
</div>
 <?php } else { ?>
<div class="prompt" onclick="closePopUp();">
	<div class="confirmation">
		<p>
			<?php echo $_smarty_tpl->tpl_vars['open_ask']->value;?>

		</p>
		<span class="icon-circle-check button confirm"><?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
</span>
		<span class="icon-circle-cross button cancel"><?php echo $_smarty_tpl->tpl_vars['cancel']->value;?>
</span>
	</div>
</div>
<div class="open_shop">
	<form method="post" action="shop.php" name="session_starter">
		<input type="hidden" name="shop_action" value="open">
		<input type="submit" name="start" value="<?php echo $_smarty_tpl->tpl_vars['open']->value;?>
">
	</form>
</div>
 <?php }?>
<script type="text/javascript">
	var form = new SessionControl('session_starter');
</script><?php }} ?>
