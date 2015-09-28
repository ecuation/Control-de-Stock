{include file="header.tpl"}
<h2 class="section-name">{$list_view}</h2>
<!-- session date -->
<div class="session-date">
	<span>{$summary_products[0].session_date}</span>
</div>
<!-- Actual info -->
<div class="month_info">
	<ul>
		<li>{$this_months_activity}: {$month_sales}€</li>
		<li>{$transactions}: {$operations}</li>
	</ul>
</div>
<div class="pagination-options cf">
	<ul>
		<li>Display</li>
		<li><a href="{$smarty.server.PHP_SELF}?records=5&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">5</a></li>	
		<li><a href="{$smarty.server.PHP_SELF}?records=10&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">10</a></li>
		<li><a href="{$smarty.server.PHP_SELF}?records=15&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">15</a></li>
		<li><a href="{$smarty.server.PHP_SELF}?records=10000&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">all</a></li>
	</ul>
</div>
<!-- Pagination orbs -->
 {$pagination} {section name=map loop=$summary_products}
<div class="products-grid cf">
	<!-- products-grid -->
	<div class="category-color" style="background:{$summary_products[map].color};">
	</div>
	<div class="position-time">
		<span class="position">{$summary_products[map].position}</span>
		<div class="time">
			<span class="icon-clock">{$summary_products[map].date_sale}</span>
		</div>
	</div>
	<div class="product-name">
		<span>{$summary_products[map].product}</span><br>
		<div class="oper-details cf">
			 {if {$summary_products[map].reference|count_characters} > 0 } <span class="icomoon-info32 small-icon">{$summary_products[map].reference}</span>{/if}<br>
			
            <!-- related product information -->
            <span class="icon-link small-icon">
                {if {$summary_products[map].related_product|count_characters} > 0 }
                    {$summary_products[map].related_product}<span> ({$summary_products[map].related_reference})</span>
                {/if}
			</span><br>
                
	<span class="icon-speech-bubble small-icon" id="note-trigger">&nbsp;</span>
	<textarea id="{$summary_products[map].id_sale}" class="animated txt-alert input-editable" placeholder="...">{$summary_products[map].note|html_entity_decode}</textarea>
                     
			<script type="text/javascript">
			 	var inputEditor = new InputEditor('.input-editable');
			 	inputEditor.init();
			 </script>
		</div>
	</div>
	<div class="details">
		<span class="txt-highlight">Qty: <span>{$summary_products[map].quantity}</span></span><br>
		<span class="txt-highlight euro">Price: </span><span>{$summary_products[map].price}</span><br>
		<span class="txt-highlight">Payment: </span><span>{$summary_products[map].payment_type}</span><br>
		<span class="txt-highlight">Invoice: </span>
		<!-- invoice view -->
		 {if {$summary_products[map].invoice} eq "1"} <span class="icon-check small-icon"></span>
		{else} </span><span>-</span> {/if} </span><br>
		<div class="employee">
			<span class="icomoon-user42">{$summary_products[map].employee_name}</span>
		</div>
	</div>
	<div class="price">
		 {if {$summary_products[map].id_payment_type} eq "5" } <span class="price-negative euro">{$summary_products[map].amount}</span>
		{elseif {$summary_products[map].id_payment_type} eq "6"} <span class="price-negative euro">{$summary_products[map].amount}</span>
		{elseif {$summary_products[map].id_payment_type} eq "7"} <span class="price-attention euro">{$summary_products[map].amount}</span>
		{else} <span class="price-positive euro">{$summary_products[map].amount}</span>
		{/if}
	</div>
</div>
 {/section}
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
</html>