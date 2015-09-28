{include file="header.tpl"}
<h2 class="section-name">Overview</h2>
<!-- session date -->
<div class="session-date">
	<span>{$sale_info[0].session_date}</span>
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
 {$pagination} 
<!--{section name=record loop=$sale_info} 
	    <tr bgcolor='#B9DCFF'></tr>     
	{/section} -->
 {section name=record loop=$sale_info} {for $foo=0 to {$sale_info[record].category|@count-1}}
<div class="overview-grid cf">
	<!-- products-grid -->
	<div class="category-color" style="background:{$sale_info[record].category_color[{$foo}]};">
	</div>
	<div class="overview-operations">
		<span class="operations">{$sale_info[record].quantity}</span><br>
	</div>
	<div class="overview-depname">
		<span>{$sale_info[record].category[{$foo}]}</span>
		<hr>
		<span class="price-overview euro">
		{$sale_info[record].total} </span>
	</div>
	<div class="details item">
		<span class="txt-highlight">Cash: </span><span>({$sale_info[record].cash_movements})</span>&nbsp; €{$sale_info[record].total_cash} <span>
		</span><br>
		<span class="txt-highlight">Credit: </span><span>({$sale_info[record].credit_movements})</span>&nbsp; €{$sale_info[record].total_credit} <span>
		</span><br>
		<span class="txt-highlight">Check: </span><span>({$sale_info[record].check_movements})</span>&nbsp; €{$sale_info[record].total_check} <span>
		</span><br>
		<span class="txt-highlight">Other: </span><span>({$sale_info[record].other_movements})</span>&nbsp; €{$sale_info[record].total_other} <span>
	</div>
	<div class="details item">
		<span class="txt-highlight">Refund: </span><span>({$sale_info[record].refund_movements})</span>&nbsp; €{$sale_info[record].total_refund} <span>
		</span><br>
		<span class="txt-highlight">Cancellation: </span><span>({$sale_info[record].cancellation_movements})</span>&nbsp; €{$sale_info[record].total_cancellation} <span>
		</span><br>
		<span class="txt-highlight">Replacement: </span><span>({$sale_info[record].replacement_movements})</span>&nbsp; 
		<!-- €{$sale_info[record].total_replacement} -->
		<span>
		</span><br>
		<span class="txt-highlight">Other: </span><span>({$sale_info[record].otherC_movements})</span>&nbsp; €{$sale_info[record].total_otherC} <span>
	</div>
	<div class="details item">
		<span class="txt-highlight">Ticket: </span><span>({$sale_info[record].ticket_movements})</span>&nbsp; €{$sale_info[record].total_ticket} <span>
		</span><br>
		<span class="txt-highlight">Invoice: </span><span>({$sale_info[record].invoice_movements})</span>&nbsp; €{$sale_info[record].total_invoice} <span>
	</div>
</div>
 {/for} {/section}
</div>
<!-- end of wrapper -->
</body>
</html>