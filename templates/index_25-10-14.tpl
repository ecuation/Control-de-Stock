{include file="header.tpl"} {foreach from=$authentication_errors item=item}
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error">{${$item}}</span>
</div>
 {/foreach}
 <div class="login_form">
	<form action="index.php" method="post">
		 {if {$emailError}== 'error'} <input class="input_error" type="text" name="email">
		{else} <input type="text" name="email" placeholder="Email"> {/if} {if {$passwordError}== 'error'} <input class="input_error" type="password" name="password">
		{else} <input type="password" name="password" placeholder="Password">
		{/if} <input type="submit" name="submit" value="enter">
	</form>
</div>
</div>
<!-- wrapper close -->
</body>
</html>