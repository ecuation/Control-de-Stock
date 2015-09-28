<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:35:04
         compiled from "./templates/overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119264746656086f18044468-53645320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6e736c5e191a83c17f356e3c4b532f374a9bcce' => 
    array (
      0 => './templates/overview.tpl',
      1 => 1414263786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119264746656086f18044468-53645320',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sale_info' => 0,
    'this_months_activity' => 0,
    'month_sales' => 0,
    'transactions' => 0,
    'operations' => 0,
    'pagination' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086f18241c23_83594302',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086f18241c23_83594302')) {function content_56086f18241c23_83594302($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<h2 class="section-name">Overview</h2>
<!-- session date -->
<div class="session-date">
	<span><?php echo $_smarty_tpl->tpl_vars['sale_info']->value[0]['session_date'];?>
</span>
</div>
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
<!-- Pagination orbs -->
 <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
 
<!--<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['record'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['record']);
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
?> 
	    <tr bgcolor='#B9DCFF'></tr>     
	<?php endfor; endif; ?> -->
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
?> <?php ob_start();?><?php echo count($_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['category'])-1;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_tmp1+1 - (0) : 0-($_tmp1)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 0, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
<div class="overview-grid cf">
	<!-- products-grid -->
	<div class="category-color" style="background:<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['category_color'][$_tmp2];?>
;">
	</div>
	<div class="overview-operations">
		<span class="operations"><?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['quantity'];?>
</span><br>
	</div>
	<div class="overview-depname">
		<span><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
<?php $_tmp3=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['category'][$_tmp3];?>
</span>
		<hr>
		<span class="price-overview euro">
		<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total'];?>
 </span>
	</div>
	<div class="details item">
		<span class="txt-highlight">Cash: </span><span>(<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['cash_movements'];?>
)</span>&nbsp; €<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total_cash'];?>
 <span>
		</span><br>
		<span class="txt-highlight">Credit: </span><span>(<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['credit_movements'];?>
)</span>&nbsp; €<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total_credit'];?>
 <span>
		</span><br>
		<span class="txt-highlight">Check: </span><span>(<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['check_movements'];?>
)</span>&nbsp; €<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total_check'];?>
 <span>
		</span><br>
		<span class="txt-highlight">Other: </span><span>(<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['other_movements'];?>
)</span>&nbsp; €<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total_other'];?>
 <span>
	</div>
	<div class="details item">
		<span class="txt-highlight">Refund: </span><span>(<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['refund_movements'];?>
)</span>&nbsp; €<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total_refund'];?>
 <span>
		</span><br>
		<span class="txt-highlight">Cancellation: </span><span>(<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['cancellation_movements'];?>
)</span>&nbsp; €<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total_cancellation'];?>
 <span>
		</span><br>
		<span class="txt-highlight">Replacement: </span><span>(<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['replacement_movements'];?>
)</span>&nbsp; 
		<!-- €<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total_replacement'];?>
 -->
		<span>
		</span><br>
		<span class="txt-highlight">Other: </span><span>(<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['otherC_movements'];?>
)</span>&nbsp; €<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total_otherC'];?>
 <span>
	</div>
	<div class="details item">
		<span class="txt-highlight">Ticket: </span><span>(<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['ticket_movements'];?>
)</span>&nbsp; €<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total_ticket'];?>
 <span>
		</span><br>
		<span class="txt-highlight">Invoice: </span><span>(<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['invoice_movements'];?>
)</span>&nbsp; €<?php echo $_smarty_tpl->tpl_vars['sale_info']->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['total_invoice'];?>
 <span>
	</div>
</div>
 <?php }} ?> <?php endfor; endif; ?>
</div>
<!-- end of wrapper -->
</body>
</html><?php }} ?>
