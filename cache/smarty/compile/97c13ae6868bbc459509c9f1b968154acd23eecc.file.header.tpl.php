<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:35:09
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203902103156086f1d9637d9-91101441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1414327089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203902103156086f1d9637d9-91101441',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_title' => 0,
    'js_files' => 0,
    'media' => 0,
    'css_files' => 0,
    'file_name' => 0,
    '_IS_ADMIN_' => 0,
    'settings' => 0,
    '_USER_KEY_' => 0,
    '_USER_NAME_' => 0,
    'logout' => 0,
    'lang' => 0,
    'shop_name' => 0,
    'time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086f1da4a867_86867518',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086f1da4a867_86867518')) {function content_56086f1da4a867_86867518($_smarty_tpl) {?><!DOCTYPE html>
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
</head>
<body>
<div class="wrapper">
	<?php if ($_smarty_tpl->tpl_vars['file_name']->value!="index.php") {?>
		<header>
		<div id="global-nav">
			 <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_IS_ADMIN_']->value==1;?>
<?php $_tmp1=ob_get_clean();?><?php if ((isset($_SESSION['is_admin']))&&($_tmp1)) {?>
			<div class="admin_details">
				<a class="icon-cog" href="admin1985/"><?php echo $_smarty_tpl->tpl_vars['settings']->value;?>
</a>
			</div>
			 <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['_IS_ADMIN_']->value==0;?>
<?php $_tmp2=ob_get_clean();?><?php if ((isset($_SESSION['is_admin']))&&($_tmp2)) {?>
			<div class="admin_details">
				<a class="icon-cog" href="settings.php"><?php echo $_smarty_tpl->tpl_vars['settings']->value;?>
</a>
			</div>
			 <?php }}?> <?php if ((preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['_USER_KEY_']->value, $tmp)==40)) {?>
			<div class="user_details">
				<span class="icon-head"><?php echo $_smarty_tpl->tpl_vars['_USER_NAME_']->value;?>
 / </span>
				<a href="index.php" class="icon-lock"><?php echo $_smarty_tpl->tpl_vars['logout']->value;?>
</a>
				<?php if (($_smarty_tpl->tpl_vars['file_name']->value=="settings.php")) {?> <span>(<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
)</span>
				<?php }?>
			</div>
			 <?php }?>
		</div>
		<div class="shop_details">
			<span class="shop-name"><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
 <?php if (($_smarty_tpl->tpl_vars['file_name']->value!="index.php")&&($_smarty_tpl->tpl_vars['file_name']->value!="shop_selection.php")) {?> <a class="icon-mail" href="messages_list.php"></a>
			<span class="messages-bubble">+99</span>
			<?php }?> </span>
			<br>
			<span><?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</span><br>
			<span class="icon-clock" id="clock"></span>
		</div>
		<span id="screen-resolution"></span>
		</header> 
		<div class="extras">
			<a href="<?php echo $_SERVER['REQUEST_URI'];?>
" class="icon-reload"></a>
			<?php if (($_smarty_tpl->tpl_vars['file_name']->value=="settings.php")) {?>
			<div id="style-switcher">
				<span class="icon-eye">&nbsp;</span><span>try me:</span>
				<a href="#" onclick="setActiveStyleSheet('default'); return false;">1</a>
				<a href="#" onclick="setActiveStyleSheet('alternate 1'); return false;">2</a>
			</div>
			 <?php }?>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	<?php }} ?>
