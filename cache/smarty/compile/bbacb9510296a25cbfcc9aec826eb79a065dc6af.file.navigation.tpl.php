<?php /* Smarty version Smarty-3.1.17, created on 2015-09-28 00:35:09
         compiled from "./templates/navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106793000956086f1da547d0-63374951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbacb9510296a25cbfcc9aec826eb79a065dc6af' => 
    array (
      0 => './templates/navigation.tpl',
      1 => 1414263785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106793000956086f1da547d0-63374951',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'navigator' => 0,
    'num' => 0,
    'page_name' => 0,
    '($_smarty_tpl->tpl_vars[\'page_name\']->value)' => 0,
    'current_page' => 0,
    '($_smarty_tpl->tpl_vars[\'current_page\']->value)' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_56086f1da8e7c5_16850080',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56086f1da8e7c5_16850080')) {function content_56086f1da8e7c5_16850080($_smarty_tpl) {?><nav>
    <ul id="breadcrumb">
        <?php  $_smarty_tpl->tpl_vars['page_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page_name']->_loop = false;
 $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['navigator']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page_name']->key => $_smarty_tpl->tpl_vars['page_name']->value) {
$_smarty_tpl->tpl_vars['page_name']->_loop = true;
 $_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['page_name']->key;
?>
            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['num']->value;?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo count($_smarty_tpl->tpl_vars['navigator']->value)-1;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp3==$_tmp4) {?>
                <li><a class="lastcrumb" href="<?php echo $_smarty_tpl->tpl_vars['page_name']->value;?>
.php"><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['page_name']->value)]->value;?>
</a></li>
            <?php } else { ?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['page_name']->value;?>
.php"><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['page_name']->value)]->value;?>
</a></li>   
            <?php }?>           
        <?php } ?>
        	<li><?php echo $_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['current_page']->value)]->value;?>
</li>
    </ul>
</nav><?php }} ?>
