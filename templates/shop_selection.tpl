{include file="header.tpl"} {if {$shopNotSelected} eq "true"}
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error">{$select_a_shop}</span>
</div>
 {/if} {if {$accessDenied} eq "true"}
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error">{$access_denied}</span>
</div>
 {/if}

<ul class="sections">
	 {section name=map loop=$shopList}
	<li class="shop-list">
	<a class="icomoon-uniE6602" href="shop_session_starter.php?id_shop={$shopList[map].id_shop}">{$shopList[map].shop}</a>
	</li>
	 {/section}
</ul>
</div>
<!-- end of wrapper -->
</body>
</html>