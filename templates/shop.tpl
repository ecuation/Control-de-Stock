{include file="header.tpl"}
<h2 class="section-name">{$shop}</h2>
<!-- Actual info -->
<div class="month_info">
	<ul>
		<li>{$this_months_activity}: {$month_sales}€</li>
		<li>{$transactions}: {$operations}</li>
	</ul>
</div>
<ul class="sections">
	<li class="sale">
	<a class="icon-bag" href="sale.php">{$sale|ucfirst}</a>
	</li>
	<li class="cancel-devolution">
	<a class="icon-repeat" href="cancel.php">{$cancellation|ucfirst}</a>
	</li>
	<li class="list-view">
	<a class="icon-clipboard" href="list_view.php?active=1">{$list_view|ucfirst}</a>
	</li>
	<li class="overview">
	<a class="icon-layers" href="overview.php?active=1">{$overview|ucfirst}</a>
	</li>
	<li class="archive">
	<a class="icon-archive" href="history_list.php">{$sale_history|ucfirst}</a>
	</li>
</ul>
 {include file="open_shop_buttons.tpl"}
</div>
<!-- end of wrapper -->
</body>
</html>