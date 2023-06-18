<?php
/* Smarty version 4.3.0, created on 2023-06-18 19:12:35
  from '/var/www/html/library/app/views/Hello.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_648f5723ca35c9_17990442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93c682ee363af28b600e088ceae52cfdfb269c1e' => 
    array (
      0 => '/var/www/html/library/app/views/Hello.tpl',
      1 => 1687115554,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_648f5723ca35c9_17990442 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
  <head>
    <meta charset="utf-8" />
    <title>Hello World | Amelia framework</title>

    <link
      href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css"
      rel="stylesheet"
    />
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
select.js"><?php echo '</script'; ?>
>
  </head>

  <body>
    My value: <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
    <ul>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
      <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
    <?php }?>
    <select name="test" id="test">
      <option value="test1">test1</option>
      <option value="test2">test2</option>
      <option value="inna opcaj" selected>inna opcaj</option>
    </select>
  </body>
</html>
<?php }
}
