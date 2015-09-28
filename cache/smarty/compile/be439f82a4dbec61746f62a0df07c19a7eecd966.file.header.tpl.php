<?php /* Smarty version Smarty-3.1.17, created on 2015-05-05 19:31:57
         compiled from "templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16161575945548fe8d421375-28162285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be439f82a4dbec61746f62a0df07c19a7eecd966' => 
    array (
      0 => 'templates/header.tpl',
      1 => 1414275589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16161575945548fe8d421375-28162285',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'js_files' => 0,
    'media' => 0,
    'css_files' => 0,
    'shop_selection' => 0,
    '_USER_KEY_' => 0,
    '_USER_NAME_' => 0,
    'logout' => 0,
    'lang' => 0,
    'shop_name' => 0,
    'time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5548fe8d467f47_85661262',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5548fe8d467f47_85661262')) {function content_5548fe8d467f47_85661262($_smarty_tpl) {?><!DOCTYPE html>
<html lang="es">
<head>
<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' type='text/css'>
 <?php if (isset($_smarty_tpl->tpl_vars['js_files']->value)) {?> <?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['js_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
"></script>
 <?php } ?> <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {?> <?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
" type="text/css"/>
 <?php } ?> <?php }?>
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
			<a class="icon-cog" href="../shop_selection.php"><?php echo $_smarty_tpl->tpl_vars['shop_selection']->value;?>
</a>
		</div>
		 <?php if ((preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['_USER_KEY_']->value, $tmp)==40)) {?>
		<div class="user_details">
			<span class="icon-head"><?php echo $_smarty_tpl->tpl_vars['_USER_NAME_']->value;?>
 / </span>
			<a href="index.php" class="icon-lock"><?php echo $_smarty_tpl->tpl_vars['logout']->value;?>
</a>
			<span>(<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
)</span>
		</div>
		 <?php }?>
	</div>
	<div class="shop_details">
		<span class="shop-name"><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</span><br>
		<span><?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</span><br>
		<span class="icon-clock" id="clock"></span>
	</div>
	<span id="screen-resolution"></span>
	</header>
	<div class="extras">
		<a href="<?php echo $_SERVER['REQUEST_URI'];?>
" class="icon-reload"></a>
		<div id="style-switcher">
			<span class="icon-eye">&nbsp;</span>
			<a href="#" onclick="setActiveStyleSheet('default'); return false;">1</a>
			<a href="#" onclick="setActiveStyleSheet('alternate 1'); return false;">2</a>
			<!--<a href="#" onclick="setActiveStyleSheet('alternate 2'); return false;">3</a>
                <a href="#" onclick="setActiveStyleSheet('alternate 3'); return false;">4</a>-->
		</div>
	</div>
<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
