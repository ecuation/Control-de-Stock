{include file="header.tpl"} {if $shop_is_not_open eq "true"}
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error">{$shop_close_error}</span>
</div>
 {/if} {if $shopOpened eq "true"}
<div class="msg-to-user">
	<span class="icon-check">&nbsp;</span><span class="txt-succesfull">{$shop_opened}</span>
</div>
 {/if} {if $shopClosed eq "true"}
<div class="msg-to-user">
	<span class="icon-check">&nbsp;</span><span class="txt-succesfull">{$shop_closed}</span>
</div>
 {/if} {if ($_USER_KEY_|count_characters == 40)}
<ul class="sections">
	<li class="shop">
	<a class="icon-bar-graph" href="shop.php">{$shop|ucfirst}</a>
	</li>
	<li class="warehouse">
	<a class="icon-box" href="warehouse.php">{$warehouse|ucfirst}</a>
	</li>
</ul>
 {/if} {include file="open_shop_buttons.tpl"}
</div>
<!-- end of wrapper -->
</body>
</html>