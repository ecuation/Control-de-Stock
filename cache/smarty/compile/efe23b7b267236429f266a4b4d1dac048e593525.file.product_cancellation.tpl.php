<?php /* Smarty version Smarty-3.1.17, created on 2014-11-01 13:40:28
         compiled from "./templates/product_cancellation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8058047115454d4bca4fce8-18847517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efe23b7b267236429f266a4b4d1dac048e593525' => 
    array (
      0 => './templates/product_cancellation.tpl',
      1 => 1414263787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8058047115454d4bca4fce8-18847517',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hasChildrenCategories' => 0,
    'cancellation' => 0,
    'product_holder' => 0,
    'refund' => 0,
    'replacement' => 0,
    'other' => 0,
    'hint_refund' => 0,
    'hint_cancellation' => 0,
    'hint_replacement' => 0,
    'note_holder' => 0,
    'confirm' => 0,
    'cancel' => 0,
    'reset' => 0,
    'productFormMessage' => 0,
    'priceFormMessage' => 0,
    'reqPrice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5454d4bcb44b05_35687191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5454d4bcb44b05_35687191')) {function content_5454d4bcb44b05_35687191($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="popup">
	<span class="close-popup" onclick="closePopUp()">x</span>
	<?php echo $_smarty_tpl->getSubTemplate ("preloader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class="searcher-wrapper">
		<br>
		<p>
			Please, enter product name to search
		</p>
		<input placeholder="search..." type="text" class="autocomplete-ajax" id="input-primary-product"/>

		<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['hasChildrenCategories']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=="true") {?> 
		 	<input placeholder="search..." type="text" id="input-secondary-product" class="autocomplete-ajax"/>
		<?php }?>
	</div>
	<div class="canvas">
		<ul class="category"></ul>
	</div>
</div>
<div class="container">
	<h2><?php echo ucfirst($_smarty_tpl->tpl_vars['cancellation']->value);?>
</h2>
	<form method="post" action="product_cancellation.php?id_category=<?php echo $_GET['id_category'];?>
" name="product_form">
		<input type="hidden" name="id_product" id="id_product_target">
		<input type="hidden" name="id_sale_type" value="0">
		<input type="hidden" value="3" id="invoice" name="invoice">
		<input type="hidden" name="id_category" value="<?php echo $_GET['id_category'];?>
">
		<!-- recoge el valor de la id del producto -->
		<span class="icon-tag">&nbsp;</span>
		<span id="primary-trigger"><?php echo $_smarty_tpl->tpl_vars['product_holder']->value;?>
</span>
		
		<script type="text/javascript" src="js/productClassInit.js"></script>
		<hr>
		<span class="txt-highlight">Qty: </span><input type="number" name="quantity" min="1" max="100" value="1" width="5" id="qty" onchange="calculateAmount();">
		<hr>
		<span class="txt-highlight euro">Price: </span><input type="text" name="price" size="5" id="price" onchange="calculateAmount();">
		<span class="txt-highlight euro">Total: </span><span class="amount"></span>
		<hr>
		<span class="txt-highlight">Type: </span>
		<input type="radio" value="5" name="id_payment_type" id="refund" checked="checked"><label for="refund"><?php echo $_smarty_tpl->tpl_vars['refund']->value;?>
</label>
		<input type="radio" value="6" name="id_payment_type" id="cancellation"><label for="cancellation"><?php echo $_smarty_tpl->tpl_vars['cancellation']->value;?>
</label>
		<input type="radio" value="7" name="id_payment_type" id="replacement"><label for="replacement"><?php echo $_smarty_tpl->tpl_vars['replacement']->value;?>
</label>
		<input type="radio" value="8" name="id_payment_type" id="other"><label for="other"><?php echo $_smarty_tpl->tpl_vars['other']->value;?>
</label>
		<!--
			5 = refund
			6 = cancellation
			7 = replacement
			4 = other
		-->
		<hr>
		<span class="icon-help"></span><br>
		<span><?php echo $_smarty_tpl->tpl_vars['hint_refund']->value;?>
</span><br>
		<span><?php echo $_smarty_tpl->tpl_vars['hint_cancellation']->value;?>
</span><br>
		<span><?php echo $_smarty_tpl->tpl_vars['hint_replacement']->value;?>
</span>
		<hr>
		<span class="icon-speech-bubble" id="note-trigger"></span>
		<textarea name="note" rows="2" cols="36" maxlength="90" class="txt-alert" placeholder="(<?php echo $_smarty_tpl->tpl_vars['note_holder']->value;?>
)"></textarea>
		<hr>
		<script type="text/javascript" src="js/Autocomplete.js"></script>
		<script type="text/javascript">			

			var autocompleteCategory = new Autocomplete();
			autocompleteCategory.setPopupTrigger('#primary-trigger');
			autocompleteCategory.setContainer('.canvas');
			autocompleteCategory.setInputAutocomplete('#input-primary-product');
			autocompleteCategory.setAjaxPath("tools/ajax/AutoComplete.php");
			autocompleteCategory.setPathVars("id_category="+<?php echo $_GET['id_category'];?>
+"&delimiter="+<?php echo $_GET['delimiter'];?>
+"&action=category");
			autocompleteCategory.init();

			autocompleteCategory.onSelect = function (elem, data)
			{
				$('#primary-trigger').html(data.value);
				$('#id_product_target').val(data.id_product);
				$('.popup').hide('normal');	
				$('#qty').val(1);
				$('#price').val(data.price);
				calculateAmount();
			};
		</script>
		<!-- if the parent category has children category this will be showed -->
		<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['hasChildrenCategories']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=="true") {?> 
			<a id="secondary-trigger" class="get-related" href="#"> click to add subproduct </a>
			<br>
			<div id="autocomplete-selection"></div>
				
			<script type="text/javascript">
				var autocompleteRelated = new Autocomplete();
				autocompleteRelated.setPopupTrigger('#secondary-trigger');
				autocompleteRelated.setContainer('.canvas');
				autocompleteRelated.setInputAutocomplete('#input-secondary-product');
				autocompleteRelated.setAjaxPath("tools/ajax/AutoComplete.php");
				autocompleteRelated.setPathVars("id_category="+<?php echo $_GET['id_category'];?>
+"&delimiter="+<?php echo $_GET['delimiter'];?>
+"&action=related");
				autocompleteRelated.init();

				autocompleteRelated.onSelect = function (elem, data)
				{
					$('#autocomplete-selection').html(data.value);
					$('#id_product_related').val(data.id_product);
					$('#subproduct_stock').val(data.stock);
					$('.popup').hide('normal');	
				};		
			</script>
		<?php }?>  
		<br>
		<input type="hidden" name="id_product_related" id="id_product_related">
		<input type="hidden" value="0" name="sub_product_stock" id="subproduct_stock">
		<span class="icon-circle-check"></span><input class="button confirm" type="submit" name="confirm" value="<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
">
		<span class="icon-circle-cross"></span><a href="sale.php" class="button cancel"><?php echo $_smarty_tpl->tpl_vars['cancel']->value;?>
</a>
		<span class="icomoon-cycle2"></span><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" class="button reset"><?php echo $_smarty_tpl->tpl_vars['reset']->value;?>
</a>
	</form>
	<script type="text/javascript">
		var frmvalidator  = new Validator("product_form");
		  frmvalidator.addValidation("id_product","req","<?php echo $_smarty_tpl->tpl_vars['productFormMessage']->value;?>
");
		  frmvalidator.addValidation("price","numeric","<?php echo $_smarty_tpl->tpl_vars['priceFormMessage']->value;?>
");
		  frmvalidator.addValidation("price","req","<?php echo $_smarty_tpl->tpl_vars['reqPrice']->value;?>
");
		  frmvalidator.addValidation("note","maxlen=150","Note max length is 150");
	</script>
</div>
</div>
<!-- end of wrapper -->
</body>
</html><?php }} ?>
