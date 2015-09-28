<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:34:57
         compiled from "./templates/list_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30390120556086f1166b4f0-34413323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '198dd568c24d0fd77ab01ea17830f07af8c35dbf' => 
    array (
      0 => './templates/list_view.tpl',
      1 => 1414263784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30390120556086f1166b4f0-34413323',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list_view' => 0,
    'summary_products' => 0,
    'this_months_activity' => 0,
    'month_sales' => 0,
    'transactions' => 0,
    'operations' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086f11785854_55318733',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086f11785854_55318733')) {function content_56086f11785854_55318733($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<h2 class="section-name"><?php echo $_smarty_tpl->tpl_vars['list_view']->value;?>
</h2>
<!-- session date -->
<div class="session-date">
	<span><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[0]['session_date'];?>
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
 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['map'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['map']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['name'] = 'map';
$_smarty_tpl->tpl_vars['smarty']->value['section']['map']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['summary_products']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
<div class="products-grid cf">
	<!-- products-grid -->
	<div class="category-color" style="background:<?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['color'];?>
;">
	</div>
	<div class="position-time">
		<span class="position"><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['position'];?>
</span>
		<div class="time">
			<span class="icon-clock"><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['date_sale'];?>
</span>
		</div>
	</div>
	<div class="product-name">
		<span><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['product'];?>
</span><br>
		<div class="oper-details cf">
			 <?php ob_start();?><?php echo preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['reference'], $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <span class="icomoon-info32 small-icon"><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['reference'];?>
</span><?php }?><br>
			
            <!-- related product information -->
            <span class="icon-link small-icon">
                <?php ob_start();?><?php echo preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['related_product'], $tmp);?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                    <?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['related_product'];?>
<span> (<?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['related_reference'];?>
)</span>
                <?php }?>
			</span><br>
                
	<span class="icon-speech-bubble small-icon" id="note-trigger">&nbsp;</span>
	<textarea id="<?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['id_sale'];?>
" class="animated txt-alert input-editable" placeholder="..."><?php echo html_entity_decode($_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['note']);?>
</textarea>
                     
			<script type="text/javascript">
			 	var inputEditor = new InputEditor('.input-editable');
			 	inputEditor.init();
			 </script>
		</div>
	</div>
	<div class="details">
		<span class="txt-highlight">Qty: <span><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['quantity'];?>
</span></span><br>
		<span class="txt-highlight euro">Price: </span><span><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['price'];?>
</span><br>
		<span class="txt-highlight">Payment: </span><span><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['payment_type'];?>
</span><br>
		<span class="txt-highlight">Invoice: </span>
		<!-- invoice view -->
		 <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['invoice'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3=="1") {?> <span class="icon-check small-icon"></span>
		<?php } else { ?> </span><span>-</span> <?php }?> </span><br>
		<div class="employee">
			<span class="icomoon-user42"><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['employee_name'];?>
</span>
		</div>
	</div>
	<div class="price">
		 <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['id_payment_type'];?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4=="5") {?> <span class="price-negative euro"><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['amount'];?>
</span>
		<?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['id_payment_type'];?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5=="6") {?> <span class="price-negative euro"><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['amount'];?>
</span>
		<?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['id_payment_type'];?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6=="7") {?> <span class="price-attention euro"><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['amount'];?>
</span>
		<?php } else { ?> <span class="price-positive euro"><?php echo $_smarty_tpl->tpl_vars['summary_products']->value[$_smarty_tpl->getVariable('smarty')->value['section']['map']['index']]['amount'];?>
</span>
		<?php }}}?>
	</div>
</div>
 <?php endfor; endif; ?>
</div>
<!-- end of wrapper -->

<!-- Textarea Autosize -->
<script>
$(function(){
	$('.normal').autosize();
	$('.animated').autosize();
	});
</script>
</body>
</html><?php }} ?>
