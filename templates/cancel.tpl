{include file="header.tpl"} {if $formMessages eq "true"}
<div class="msg-to-user">
	<span class="icon-check">&nbsp;</span><span class="txt-succesfull">{$actionSuccess|ucfirst}</span>
</div>
 {elseif $formMessages eq "false"}
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error">{$actionError|ucfirst}</span>
</div>
 {/if}
<ul class="category">
	 {section name=map loop=$categoryList}
	<li>
	<a style="background:{$categoryList[map].color};" href="product_cancellation.php?id_category={$categoryList[map].id_category}&delimiter=0">{$categoryList[map].category_name}</a>
	</li>
	 {/section}
</ul>
</div>
<!-- end of wrapper -->
</body>
</html>