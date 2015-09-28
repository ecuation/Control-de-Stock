{if $isOpenShop eq "true"}
<div class="prompt" onclick="closePopUp();">
	<div class="confirmation">
		<p>
			{$close_ask}
		</p>
		<span class="icon-circle-check button confirm">{$confirm}</span>
		<span class="icon-circle-cross button cancel">{$cancel}</span>
	</div>
</div>
<div class="close_shop">
	<form method="post" action="shop.php" name="session_starter">
		<input type="hidden" name="shop_action" value="close">
		<input type="submit" name="start" value="{$close}">
	</form>
</div>
 {else}
<div class="prompt" onclick="closePopUp();">
	<div class="confirmation">
		<p>
			{$open_ask}
		</p>
		<span class="icon-circle-check button confirm">{$confirm}</span>
		<span class="icon-circle-cross button cancel">{$cancel}</span>
	</div>
</div>
<div class="open_shop">
	<form method="post" action="shop.php" name="session_starter">
		<input type="hidden" name="shop_action" value="open">
		<input type="submit" name="start" value="{$open}">
	</form>
</div>
 {/if}
<script type="text/javascript">
	var form = new SessionControl('session_starter');
</script>