<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:34:12
         compiled from "./templates/product_sale.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96783313556086ee453f2d4-89298107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98c336e3b333896e366633fb1553c1765768df57' => 
    array (
      0 => './templates/product_sale.tpl',
      1 => 1414263788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96783313556086ee453f2d4-89298107',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hasChildrenCategories' => 0,
    'sale' => 0,
    'product_holder' => 0,
    'qty' => 0,
    'price' => 0,
    'payment' => 0,
    'cash' => 0,
    'credit' => 0,
    'check' => 0,
    'other' => 0,
    'invoice' => 0,
    'checkInvoice' => 0,
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
  'unifunc' => 'content_56086ee460ca67_72215866',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086ee460ca67_72215866')) {function content_56086ee460ca67_72215866($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Popup -->

<div class="popup">
<?php echo $_smarty_tpl->getSubTemplate ("preloader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="popup-container">
	<div class="popup-topbar"><span class="close-popup">x</span></div>
	<div class="popup-header">
		<h3>Enter a product name to search</h3>
		<input placeholder="search..." type="text" name="country"  class="autocomplete-ajax" id="input-primary-product"/>

		<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['hasChildrenCategories']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=="true") {?> 
		 	<input placeholder="search..." type="text" id="input-secondary-product" class="autocomplete-ajax"/>
		<?php }?>
    
    	<div class="search-results"># results have been found</div>
	</div>
  
	<!-- Canvas -->
    <div class="canvas">
		<ul class="category"></ul>
	</div>
</div>
    
</div>

<h2 class="section-name"><?php echo ucfirst($_smarty_tpl->tpl_vars['sale']->value);?>
</h2>
<div class="container">
	<form method="post" action="product_sale.php?id_category=<?php echo $_GET['id_category'];?>
" name="product_form">
		<input type="hidden" name="id_product" id="id_product_target">
		<input type="hidden" name="id_sale_type" value="1">
		<input type="hidden" name="id_category" value="<?php echo $_GET['id_category'];?>
">
		<!-- recoge el valor de la id del producto -->
		<span class="icon-tag">&nbsp;</span>
		<span id="primary-trigger"><?php echo $_smarty_tpl->tpl_vars['product_holder']->value;?>
</span>
		<script type="text/javascript" src="js/productClassInit.js"></script>
		<hr>
		<span class="txt-highlight"><?php echo $_smarty_tpl->tpl_vars['qty']->value;?>
:</span><input type="number" name="quantity" min="1" max="100" value="1" width="5" id="qty" onchange="calculateAmount();">
		<hr>
		<span class="txt-highlight euro"><?php echo $_smarty_tpl->tpl_vars['price']->value;?>
: </span><input type="text" name="price" size="5" id="price" onchange="calculateAmount();">
		<span class="txt-highlight euro">Total: </span><span class="amount"></span>
		<hr>
		<span class="txt-highlight"><?php echo $_smarty_tpl->tpl_vars['payment']->value;?>
: </span>
		<input type="radio" value="1" name="id_payment_type" id="cash" checked="checked"><label for="cash"><?php echo $_smarty_tpl->tpl_vars['cash']->value;?>
</label>
		<input type="radio" value="2" name="id_payment_type" id="credit"><label for="credit"><?php echo $_smarty_tpl->tpl_vars['credit']->value;?>
</label>
		<input type="radio" value="3" name="id_payment_type" id="check"><label for="check"><?php echo $_smarty_tpl->tpl_vars['check']->value;?>
</label>
		<input type="radio" value="4" name="id_payment_type" id="other"><label for="other"><?php echo $_smarty_tpl->tpl_vars['other']->value;?>
</label>
		<!--
			1 = cash
			2 = credit
			3 = check
			4 = other
		-->
		<hr>
		<span class="txt-highlight"><?php echo $_smarty_tpl->tpl_vars['invoice']->value;?>
: </span>
		<input type="checkbox" value="1" id="invoice" name="invoice"><label for="invoice"><?php echo $_smarty_tpl->tpl_vars['checkInvoice']->value;?>
</label>
		<hr>
		<span class="icon-speech-bubble" id="note-trigger"></span>
		<textarea name="note" rows="2" cols="36" maxlength="90" class="txt-alert" placeholder="(<?php echo $_smarty_tpl->tpl_vars['note_holder']->value;?>
)"></textarea>
		<hr>
    
</div>
		
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
				$('#qty').attr('max', data.stock);
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
