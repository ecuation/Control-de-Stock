<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:31:45
         compiled from "./templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203618529756086e513e0dc2-65575715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62ef71fa9bffee4b2e45ea97bf20c2caac4cf263' => 
    array (
      0 => './templates/home.tpl',
      1 => 1414263782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203618529756086e513e0dc2-65575715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shop_is_not_open' => 0,
    'shop_close_error' => 0,
    'shopOpened' => 0,
    'shop_opened' => 0,
    'shopClosed' => 0,
    'shop_closed' => 0,
    '_USER_KEY_' => 0,
    'shop' => 0,
    'warehouse' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086e514591c8_15354912',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086e514591c8_15354912')) {function content_56086e514591c8_15354912($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php if ($_smarty_tpl->tpl_vars['shop_is_not_open']->value=="true") {?>
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error"><?php echo $_smarty_tpl->tpl_vars['shop_close_error']->value;?>
</span>
</div>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['shopOpened']->value=="true") {?>
<div class="msg-to-user">
	<span class="icon-check">&nbsp;</span><span class="txt-succesfull"><?php echo $_smarty_tpl->tpl_vars['shop_opened']->value;?>
</span>
</div>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['shopClosed']->value=="true") {?>
<div class="msg-to-user">
	<span class="icon-check">&nbsp;</span><span class="txt-succesfull"><?php echo $_smarty_tpl->tpl_vars['shop_closed']->value;?>
</span>
</div>
 <?php }?> <?php if ((preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['_USER_KEY_']->value, $tmp)==40)) {?>
<ul class="sections">
	<li class="shop">
	<a class="icon-bar-graph" href="shop.php"><?php echo ucfirst($_smarty_tpl->tpl_vars['shop']->value);?>
</a>
	</li>
	<li class="warehouse">
	<a class="icon-box" href="warehouse.php"><?php echo ucfirst($_smarty_tpl->tpl_vars['warehouse']->value);?>
</a>
	</li>
</ul>
 <?php }?> <?php echo $_smarty_tpl->getSubTemplate ("open_shop_buttons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<!-- end of wrapper -->
</body>
</html><?php }} ?>
