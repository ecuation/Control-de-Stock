{include file="templates/header.tpl"}
<h2>{$products}</h2>
<div class="pagination-options cf">
	<ul>
		<li>Display</li>
		<li><a href="{$smarty.server.PHP_SELF}?records=5"> 5 </a></li>
		<li><a href="{$smarty.server.PHP_SELF}?records=10"> 10 </a></li>
		<li><a href="{$smarty.server.PHP_SELF}?records=15"> 15 </a></li>
		<li><a href="{$smarty.server.PHP_SELF}?records=1000"> all </a></li>
	</ul>
</div>
<!-- Pagination orbs -->
 {$pagination} <section class="product-list">
<table class="tm">
<thead>
<tr>
	<th>
		 ID
	</th>
	<th>
		 NAME
	</th>
	<th>
		 REFERENCE
	</th>
	<th>
		 STOCK
	</th>
	<th>
		 PRICE
	</th>
	<th>
		 MODIFY
	</th>
</tr>
</thead>
<tbody>
<tr class="search-row">
	<form action="{$smarty.server.PHP_SELF}" method="post">
		<td>
			<input type="text" name="id_product">
		</td>
		<td>
			<input type="text" name="name">
		</td>
		<td>
			<input type="text" name="reference">
		</td>
		<td>
			<input type="text" name="stock_available">
		</td>
		<td>
			<input type="text" name="price">
		</td>
		<td class="searcher">
			<span class="icon-search"></span>
			<input type="submit" name="search" value="">
		</td>
	</form>
</tr>
 {section name=map loop=$productList}
<tr>
	<td>
		 {$productList[map].id_product}
	</td>
	<td class="txt-left">
		 {$productList[map].product}
	</td>
	<td>
		 {$productList[map].reference}
	</td>
	<td>
		 {$productList[map].stock_available}
	</td>
	<td>
		 {$productList[map].price}
	</td>
	<td>
		<a href=""><span class="icomoon-pencil222"></span></a>
	</td>
</tr>
 {/section}
</tbody>
</table>
</section>
</div>
<!-- end of wrapper -->
</body>
</html>