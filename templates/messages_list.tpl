{include file="header.tpl"}
<h2 class="section-name">{$messages}</h2>
<div class="pagination-options cf">
	<ul>
		<li>Display</li>
		<li><a href="{$smarty.server.PHP_SELF}?records=5&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">5</a></li>	
		<li><a href="{$smarty.server.PHP_SELF}?records=10&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">10</a></li>
		<li><a href="{$smarty.server.PHP_SELF}?records=15&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">15</a></li>
		<li><a href="{$smarty.server.PHP_SELF}?records=10000&active={$smarty.get.active}{if isset($smarty.get.id_shop_session)}&id_shop_session={$smarty.get.id_shop_session}{/if}">all</a></li>
	</ul>
</div>
 {section name=map loop=$messageCollection} {$messageCollection[map].message} {/section}
</div>
<!-- end of wrapper -->
</body>
</html>