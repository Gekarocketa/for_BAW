<?php
/* Smarty version 5.4.2, created on 2025-03-31 02:41:05
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67e9e4a1179836_11714801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63b4df1f49b8c13aa44b47d9cedc1c90ee631136' => 
    array (
      0 => 'login.tpl',
      1 => 1743381223,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e9e4a1179836_11714801 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Games\\xamp\\htdocs\\projekt3.22\\templates';
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel logowania</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/css/login.css">
</head>
<body>
    <h2>Logowanie</h2>

    <?php if ((null !== ($_smarty_tpl->getValue('error') ?? null))) {?>
        <p style="color:red;"><?php echo $_smarty_tpl->getValue('error');?>
</p>
    <?php }?>

    <form action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/security/login.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" /><br><br>

        <label for="pass">Hasło:</label>
        <input type="password" name="pass" id="pass" /><br><br>

        <input type="submit" value="Zaloguj się" />
    </form>
</body>
</html>
<?php }
}
