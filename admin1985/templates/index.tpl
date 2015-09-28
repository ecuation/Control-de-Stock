{include file="templates/header.tpl"}
<ul class="sections">
	<li class="sale">
	<a class="icon-bag" href="product_list.php">{$products}</a>
	</li>
	<li class="cancel-devolution">
	<a class="icon-repeat" href="sale_history.php">{$sale_history}</a>
	</li>
	<li class="list-view">
	<a class="icon-clipboard" href="user_permissions.php?active=1">{$user_permissions|ucfirst}</a>
	</li>
	<li class="archive">
	<a class="icon-archive" href="history_list.php">{$messages|ucfirst}</a>
	</li>
</ul>
</div>
<!-- end of wrapper -->
</body>
</html>