{include file="header.tpl"} {foreach from=$authentication_errors item=item}
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error">{${$item}}</span>
</div>
 {/foreach}
 <div class="login_form">
 <h2>Sign in</h2>
	<form action="index.php" method="post">
		 {if {$emailError}== 'error'}
            <div>
            	<span class="icon-image"></span>
            	<input type="text" name="email" placeholder="Email">
            </div>
			{else}
            
            <div>
            	<span class="icon-image"></span>
            	<input type="text" name="email" placeholder="Email">
            </div>
        {/if}
        
        {if {$passwordError}== 'error'}
            <div>
            	<span class="icon-star"></span>
                <input type="password" name="password" placeholder="Password">
            </div>
		{else} 
        
        <div>
        	<span class="icon-star"></span>
        	<input type="password" name="password" placeholder="Password">
        </div>
		{/if}
        
        <input type="submit" name="submit" value="enter">
 	 	<a class="forgot" href="#">Forgot your password?</a>
	</form>
</div>
</div>
<!-- wrapper close -->
</body>
</html>