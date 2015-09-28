<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:35:09
         compiled from "./templates/shop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105113353056086f1d878783-09049600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f9a0aa3891afee2057c445dfa815c66872d775e' => 
    array (
      0 => './templates/shop.tpl',
      1 => 1414263790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105113353056086f1d878783-09049600',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shop' => 0,
    'this_months_activity' => 0,
    'month_sales' => 0,
    'transactions' => 0,
    'operations' => 0,
    'sale' => 0,
    'cancellation' => 0,
    'list_view' => 0,
    'overview' => 0,
    'sale_history' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086f1d92eba0_48063401',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086f1d92eba0_48063401')) {function content_56086f1d92eba0_48063401($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<h2 class="section-name"><?php echo $_smarty_tpl->tpl_vars['shop']->value;?>
</h2>
<!-- Actual info -->
<div class="month_info">
	<ul>
		<li><?php echo $_smarty_tpl->tpl_vars['this_months_activity']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['month_sales']->value;?>
€</li>
		<li><?php echo $_smarty_tpl->tpl_vars['transactions']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['operations']->value;?>
</li>
	</ul>
</div>
<ul class="sections">
	<li class="sale">
	<a class="icon-bag" href="sale.php"><?php echo ucfirst($_smarty_tpl->tpl_vars['sale']->value);?>
</a>
	</li>
	<li class="cancel-devolution">
	<a class="icon-repeat" href="cancel.php"><?php echo ucfirst($_smarty_tpl->tpl_vars['cancellation']->value);?>
</a>
	</li>
	<li class="list-view">
	<a class="icon-clipboard" href="list_view.php?active=1"><?php echo ucfirst($_smarty_tpl->tpl_vars['list_view']->value);?>
</a>
	</li>
	<li class="overview">
	<a class="icon-layers" href="overview.php?active=1"><?php echo ucfirst($_smarty_tpl->tpl_vars['overview']->value);?>
</a>
	</li>
	<li class="archive">
	<a class="icon-archive" href="history_list.php"><?php echo ucfirst($_smarty_tpl->tpl_vars['sale_history']->value);?>
</a>
	</li>
</ul>
 <?php echo $_smarty_tpl->getSubTemplate ("open_shop_buttons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<!-- end of wrapper -->
</body>
</html><?php }} ?>
