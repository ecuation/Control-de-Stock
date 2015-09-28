{include file="header.tpl"}
<h2 class="section-name">{$sale_history}</h2>
<div class="pagination-options cf">
	<ul>
		<li>Display</li>
		<li><a href="{$smarty.server.PHP_SELF}?records=5&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">5</a></li>	
		<li><a href="{$smarty.server.PHP_SELF}?records=10&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">10</a></li>
		<li><a href="{$smarty.server.PHP_SELF}?records=15&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">15</a></li>
		<li><a href="{$smarty.server.PHP_SELF}?records=10000&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">all</a></li>
	</ul>
</div>
<table class="tg">
<thead>
<tr>
	<th>
		<span class="icomoon-list222"></span><a href="{$smarty.server.SELF}?orderBy=0">{$date|upper}</a>
	</th>
	<th>
		<span class="icomoon-list222"></span><a href="{$smarty.server.SELF}?orderBy=1">{$total|upper}</a>
	</th>
	<th>
		<span class="icon-clipboard">&nbsp;</span>{$show_list|upper}
	</th>
	<th>
		<span class="icon-layers">&nbsp;</span>{$show_overview|upper}
	</th>
</tr>
</thead>
<tbody>
 {section name=record loop=$sale_info} {for $foo=0 to {$sale_info[record].id_shop_session|@count-1}}
<tr {if $sale_info[record].odd eq "1" } {/if}>
	<td>
		{$sale_info[record].date}
	</td>
	<td>
		{$sale_info[record].total}€
	</td>
	<td>
		<a href="list_view.php?id_shop_session={$sale_info[record].id_shop_session}&active=0"><span class="icon-open"></span></a>
	</td>
	<td>
		<a href="overview.php?id_shop_session={$sale_info[record].id_shop_session}&active=0"><span class="icon-open"></span></a>
	</td>
</tr>
 {/for} {/section}
</tbody>
</table>
</div>
<!-- end of wrapper -->
</body>
</html>