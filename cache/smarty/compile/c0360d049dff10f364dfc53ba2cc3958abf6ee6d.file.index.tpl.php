<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:31:38
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44765198956086e4af1cad3-11772813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1420155856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44765198956086e4af1cad3-11772813',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'authentication_errors' => 0,
    'item' => 0,
    '($_smarty_tpl->tpl_vars[\'item\']->value)' => 0,
    'emailError' => 0,
    'passwordError' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086e4b074203_82949937',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086e4b074203_82949937')) {function content_56086e4b074203_82949937($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['authentication_errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<div class="msg-to-user">
	<span class="icon-cross">&nbsp;</span><span class="txt-error"><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['item']->value)]->value;?>
</span>
</div>
 <?php } ?>
 <div class="login_form">
 <h2>Sign in</h2>
	<form action="index.php" method="post">
		 <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['emailError']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=='error') {?>
            <div>
            	<span class="icon-image"></span>
            	<input type="text" name="email" placeholder="Email">
            </div>
			<?php } else { ?>
            
            <div>
            	<span class="icon-image"></span>
            	<input type="text" name="email" placeholder="Email">
            </div>
        <?php }?>
        
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['passwordError']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=='error') {?>
            <div>
            	<span class="icon-star"></span>
                <input type="password" name="password" placeholder="Password">
            </div>
		<?php } else { ?> 
        
        <div>
        	<span class="icon-star"></span>
        	<input type="password" name="password" placeholder="Password">
        </div>
		<?php }?>
        
        <input type="submit" name="submit" value="enter">
 	 	<a class="forgot" href="#">Forgot your password?</a>
	</form>
</div>
</div>
<!-- wrapper close -->
</body>
</html><?php }} ?>
