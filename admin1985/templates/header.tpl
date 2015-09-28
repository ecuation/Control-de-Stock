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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<!-- Match height elements -->
<script src="../js/jquery.matchHeight.js" type="text/javascript"></script>
<!-- styles switcher -->
<script type="text/javascript" src="../js/styleswitcher.js"></script>
<link rel="alternate stylesheet" type="text/css" href="../css/stylealt1.css" title="alternate 1"/>
<link rel="alternate stylesheet" type="text/css" href="../css/stylealt2.css" title="alternate 2"/>
<link rel="alternate stylesheet" type="text/css" href="../css/stylealt3.css" title="alternate 3"/>
<!-- Turn off telephone number detection. -->
<meta name = "format-detection" content = "telephone=no">
</head>
<body>
<div class="wrapper">
	<header>
	<div id="global-nav">
		<div class="admin_details">
			<a class="icon-cog" href="../shop_selection.php">{$shop_selection}</a>
		</div>
		 {if ($_USER_KEY_|count_characters == 40)}
		<div class="user_details">
			<span class="icon-head">{$_USER_NAME_} / </span>
			<a href="index.php" class="icon-lock">{$logout}</a>
			<span>({$lang})</span>
		</div>
		 {/if}
	</div>
	<div class="shop_details">
		<span class="shop-name">{$shop_name}</span><br>
		<span>{$time}</span><br>
		<span class="icon-clock" id="clock"></span>
	</div>
	<span id="screen-resolution"></span>
	</header>
	<div class="extras">
		<a href="{$smarty.server.REQUEST_URI}" class="icon-reload"></a>
		<div id="style-switcher">
			<span class="icon-eye">&nbsp;</span>
			<a href="#" onclick="setActiveStyleSheet('default'); return false;">1</a>
			<a href="#" onclick="setActiveStyleSheet('alternate 1'); return false;">2</a>
			<!--<a href="#" onclick="setActiveStyleSheet('alternate 2'); return false;">3</a>
                <a href="#" onclick="setActiveStyleSheet('alternate 3'); return false;">4</a>-->
		</div>
	</div>
{include file="navigation.tpl"}