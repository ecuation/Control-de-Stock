<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:35:01
         compiled from "./templates/history_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67794510456086f158967f6-43482698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a8bc55400e9656eab117385a8526b689abfcfd3' => 
    array (
      0 => './templates/history_list.tpl',
      1 => 1414263782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67794510456086f158967f6-43482698',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sale_history' => 0,
    'date' => 0,
    'total' => 0,
    'show_list' => 0,
    'show_overview' => 0,
    'sale_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086f159a5581_03432406',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086f159a5581_03432406')) {function content_56086f159a5581_03432406($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<h2 class="section-name"><?php echo $_smarty_tpl->tpl_vars['sale_history']->value;?>
</h2>
<div class="pagination-options cf">
	<ul>
		<li>Display</li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
?records=5&active=<?php echo $_GET['active'];?>
<?php if (isset($_GET['id_shop_session'])) {?>&id_shop_session=<?php echo $_GET['id_shop_session'];?>
<?php }?>">5</a></li>	
		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
?records=10&active=<?php echo $_GET['active'];?>
<?php if (isset($_GET['id_shop_session'])) {?>&id_shop_session=<?php echo $_GET['id_shop_session'];?>
<?php }?>">10</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
?records=15&active=<?php echo $_GET['active'];?>
<?php if (isset($_GET['id_shop_session'])) {?>&id_shop_session=<?php echo $_GET['id_shop_session'];?>
<?php }?>">15</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
?records=10000&active=<?php echo $_GET['active'];?>
<?php if (isset($_GET['id_shop_session'])) {?>&id_shop_session=<?php echo $_GET['id_shop_session'];?>
<?php }?>">all</a></li>
	</ul>
</div>
<table class="tg">
<thead>
<tr>
	<th>
		<span class="icomoon-list222"></span><a href="<?php echo $_SERVER['SELF'];?>
?orderBy=0"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['date']->value, 'UTF-8');?>
</a>
	</th>
	<th>
		<span class="icomoon-list222"></span><a href="<?php echo $_SERVER['SELF'];?>
?orderBy=1"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['total']->value, 'UTF-8');?>
</a>
	</th>
	<th>
		<span class="icon-clipboard">&nbsp;</span><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['show_list']->value, 'UTF-8');?>

	</th>
	<th>
		<span class="icon-layers">&nbsp;</span><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['show_overview']->value, 'UTF-8');?>

	</th>
</tr>
</thead>
<tbody>
 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['record'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['record']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['name'] = 'record';
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['sale_info']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['total']);
?> <?php ob_start();?><?php echo count($_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['id_shop_session'])-1;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_tmp1+1 - (0) : 0-($_tmp1)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 0, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
<tr <?php if ($_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['odd']=="1") {?> <?php }?>>
	<td>
		<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['date'];?>

	</td>
	<td>
		<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total'];?>
€
	</td>
	<td>
		<a href="list_view.php?id_shop_session=<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['id_shop_session'];?>
&active=0"><span class="icon-open"></span></a>
	</td>
	<td>
		<a href="overview.php?id_shop_session=<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['id_shop_session'];?>
&active=0"><span class="icon-open"></span></a>
	</td>
</tr>
 <?php }} ?> <?php endfor; endif; ?>
</tbody>
</table>
</div>
<!-- end of wrapper -->
</body>
</html><?php }} ?>
