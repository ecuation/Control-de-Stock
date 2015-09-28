<?php /* Smarty version Smarty-3.1.17, created on 2014-11-01 13:40:26
         compiled from "./templates/cancel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14696589785454d4bac60526-54154721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b81c1e5a0046b88b2f2834120bd5afd93ed61e08' => 
    array (
      0 => './templates/cancel.tpl',
      1 => 1414263781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14696589785454d4bac60526-54154721',
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
  'unifunc' => 'content_5454d4bacd7758_12097384',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5454d4bacd7758_12097384')) {function content_5454d4bacd7758_12097384($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
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
;" href="product_cancellation.php?id_category=<?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['id_category'];?>
&delimiter=0"><?php echo $_smarty_tpl->tpl_vars['categoryList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['category_name'];?>
</a>
	</li>
	 <?php endfor; endif; ?>
</ul>
</div>
<!-- end of wrapper -->
</body>
</html><?php }} ?>
