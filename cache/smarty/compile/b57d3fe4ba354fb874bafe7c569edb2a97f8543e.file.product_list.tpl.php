<?php /* Smarty version Smarty-3.1.17, created on 2015-05-05 19:31:50
         compiled from "./templates/product_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14772226475548fe8633a5e7-86176062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b57d3fe4ba354fb874bafe7c569edb2a97f8543e' => 
    array (
      0 => './templates/product_list.tpl',
      1 => 1414263919,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14772226475548fe8633a5e7-86176062',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'pagination' => 0,
    'productList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5548fe863b2091_97681402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5548fe863b2091_97681402')) {function content_5548fe863b2091_97681402($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<h2><?php echo $_smarty_tpl->tpl_vars['products']->value;?>
</h2>
<div class="pagination-options cf">
	<ul>
		<li>Display</li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
?records=5"> 5 </a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
?records=10"> 10 </a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
?records=15"> 15 </a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
?records=1000"> all </a></li>
	</ul>
</div>
<!-- Pagination orbs -->
 <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 <section class="product-list">
<table class="tm">
<thead>
<tr>
	<th>
		 ID
	</th>
	<th>
		 NAME
	</th>
	<th>
		 REFERENCE
	</th>
	<th>
		 STOCK
	</th>
	<th>
		 PRICE
	</th>
	<th>
		 MODIFY
	</th>
</tr>
</thead>
<tbody>
<tr class="search-row">
	<form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
		<td>
			<input type="text" name="id_product">
		</td>
		<td>
			<input type="text" name="name">
		</td>
		<td>
			<input type="text" name="reference">
		</td>
		<td>
			<input type="text" name="stock_available">
		</td>
		<td>
			<input type="text" name="price">
		</td>
		<td class="searcher">
			<span class="icon-search"></span>
			<input type="submit" name="search" value="">
		</td>
	</form>
</tr>
 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['map'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['map']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['name'] = 'map';
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['productList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['map']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['map']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['map']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['map']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['map']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['map']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['map']['total']);
?>
<tr>
	<td>
		 <?php echo $_smarty_tpl->tpl_vars['productList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['id_product'];?>

	</td>
	<td class="txt-left">
		 <?php echo $_smarty_tpl->tpl_vars['productList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['product'];?>

	</td>
	<td>
		 <?php echo $_smarty_tpl->tpl_vars['productList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['reference'];?>

	</td>
	<td>
		 <?php echo $_smarty_tpl->tpl_vars['productList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['stock_available'];?>

	</td>
	<td>
		 <?php echo $_smarty_tpl->tpl_vars['productList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['price'];?>

	</td>
	<td>
		<a href=""><span class="icomoon-pencil222"></span></a>
	</td>
</tr>
 <?php endfor; endif; ?>
</tbody>
</table>
</section>
</div>
<!-- end of wrapper -->
</body>
</html><?php }} ?>
