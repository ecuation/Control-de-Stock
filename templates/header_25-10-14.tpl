<!DOCTYPE html>
<html lang="es">
<head>
<title>{$page_title}</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' type='text/css'>
 {if isset($js_files)} {foreach from=$js_files key=js_uri item=media}
<script type="text/javascript" src="{$media}"></script>
 {/foreach} {/if} {if isset($css_files)} {foreach from=$css_files key=css_uri item=media}
<link rel="stylesheet" href="{$media}" type="text/css"/>
 {/foreach} {/if} 
<!-- Match height elements -->
<script type="text/javascript" src="js/jquery.matchHeight.js"></script>
<!-- Textarea Autosize -->
<script src="js/jquery.autosize.js"></script>
<!-- styles switcher -->
<script type="text/javascript" src="js/styleswitcher.js"></script>
<link rel="alternate stylesheet" type="text/css" href="css/stylealt1.css" title="alternate 1"/>
<!--<link rel="alternate stylesheet" type="text/css" href="css/stylealt2.css" title="alternate 2" />
    <link rel="alternate stylesheet" type="text/css" href="css/stylealt3.css" title="alternate 3" />-->
<!-- Turn off telephone number detection. -->
<meta name = "format-detection" content = "telephone=no">
<!-- Textarea Elastic -->
</head>
<body>
<div class="wrapper">
	{if $file_name neq "index.php"}
		<header>
		<div id="global-nav">
			 {if (isset($smarty.session.is_admin)) and ({$_IS_ADMIN_ == 1})}
			<div class="admin_details">
				<a class="icon-cog" href="admin1985/" class="settings">{$settings}</a>
			</div>
			 {elseif (isset($smarty.session.is_admin)) and ({$_IS_ADMIN_ == 0})}
			<div class="admin_details">
				<a class="icon-cog" href="settings.php" class="settings">{$settings}</a>
			</div>
			 {/if} {if ($_USER_KEY_|count_characters == 40)}
			<div class="user_details">
				<span class="icon-head">{$_USER_NAME_} / </span>
				<a href="index.php" class="login icon-lock">{$logout}</a>
				{if ($file_name eq "settings.php")} <span>({$lang})</span>
				{/if}
			</div>
			 {/if}
		</div>
		<div class="shop_details">
			<span class="shop-name">{$shop_name} {if ($file_name neq "index.php") and ($file_name neq "shop_selection.php")} <a class="icon-mail" href="messages_list.php"></a>
			<span class="messages-bubble">+99</span>
			{/if} </span>
			<br>
			<span>{$time}</span><br>
			<span class="icon-clock" id="clock"></span>
		</div>
		<span id="screen-resolution"></span>
		</header> 
		<div class="extras">
			<a href="{$smarty.server.REQUEST_URI}" class="icon-reload"></a>
			{if ($file_name eq "settings.php") }
			<div id="style-switcher">
				<span class="icon-eye">&nbsp;</span><span>try me:</span>
				<a href="#" onclick="setActiveStyleSheet('default'); return false;">1</a>
				<a href="#" onclick="setActiveStyleSheet('alternate 1'); return false;">2</a>
			</div>
			 {/if}
		</div>
		{include file="navigation.tpl"}
	{/if}
	