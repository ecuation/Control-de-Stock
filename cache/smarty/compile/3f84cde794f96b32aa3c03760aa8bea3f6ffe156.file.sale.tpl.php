<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:34:32
         compiled from "./templates/sale.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193923203956086ef8815210-93699415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f84cde794f96b32aa3c03760aa8bea3f6ffe156' => 
    array (
      0 => './templates/sale.tpl',
      1 => 1414263788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193923203956086ef8815210-93699415',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formMessages' => 0,
    'actionSuccess' => 0,
    'actionError' => 0,
    'categoryList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086ef88837f6_23665075',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086ef88837f6_23665075')) {function content_56086ef88837f6_23665075($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php if ($_smarty_tpl->tpl_vars['formMessages']->value=="true") {?>
<div class="msg-to-user">
	<span class="icon-check">&nbsp;</span><span class="txt-succesfull"><?php echo ucfirst($_smarty_tpl->tpl_vars['actionSuccess']->value);?>
</span>
</div>
 <?php } elseif ($_smarty_tpl->tpl_vars['formMessages']->value=="false") {?>
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error"><?php echo ucfirst($_smarty_tpl->tpl_vars['actionError']->value);?>
</span>
</div>
 <?php }?>
<ul class="category">
	 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['map'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['map']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['name'] = 'map';
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['categoryList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
	<li>
	<a style="background:<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['color'];?>
;" href="product_sale.php?id_category=<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['id_category'];?>
&delimiter=1"><?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['category_name'];?>
</a>
	</li>
	 <?php endfor; endif; ?>
</ul>
</div>
<!-- end of wrapper -->
</body>
</html><?php }} ?>
