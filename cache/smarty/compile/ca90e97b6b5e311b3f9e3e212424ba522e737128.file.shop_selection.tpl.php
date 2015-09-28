<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:31:43
         compiled from "./templates/shop_selection.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176298493756086e4f87dbf8-05739491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca90e97b6b5e311b3f9e3e212424ba522e737128' => 
    array (
      0 => './templates/shop_selection.tpl',
      1 => 1414263789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176298493756086e4f87dbf8-05739491',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shopNotSelected' => 0,
    'select_a_shop' => 0,
    'accessDenied' => 0,
    'access_denied' => 0,
    'shopList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086e4f8ffc89_88112818',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086e4f8ffc89_88112818')) {function content_56086e4f8ffc89_88112818($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['shopNotSelected']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=="true") {?>
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error"><?php echo $_smarty_tpl->tpl_vars['select_a_shop']->value;?>
</span>
</div>
 <?php }?> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['accessDenied']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=="true") {?>
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error"><?php echo $_smarty_tpl->tpl_vars['access_denied']->value;?>
</span>
</div>
 <?php }?>

<ul class="sections">
	 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['map'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['map']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['name'] = 'map';
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['shopList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
	<li class="shop-list">
	<a class="icomoon-uniE6602" href="shop_session_starter.php?id_shop=<?php echo $_smarty_tpl->tpl_vars['shopList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['id_shop'];?>
"><?php echo $_smarty_tpl->tpl_vars['shopList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['shop'];?>
</a>
	</li>
	 <?php endfor; endif; ?>
</ul>
</div>
<!-- end of wrapper -->
</body>
</html><?php }} ?>
