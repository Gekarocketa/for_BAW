<?php
/* Smarty version 5.4.2, created on 2025-03-24 22:22:43
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67e1cd23046934_15152843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd450413954d4e42cdff018e9a3f75c8b59d54bf1' => 
    array (
      0 => 'login.tpl',
      1 => 1742848922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e1cd23046934_15152843 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Games\\xamp\\htdocs\\projekt3.2\\templates';
?><!-- login.thl -->
<html>
<head>
    <meta charset="utf-8">
    <title>Logowanie</title>
    <!-- Jeśli używasz Big Picture, link do stylu -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/css/main.css">
</head>
<body>

<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
    <ul style="color: red;">
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'm');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('m')->value) {
$foreach0DoElse = false;
?>
        <li><?php echo $_smarty_tpl->getValue('m');?>
</li>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
<?php }?>

<h2>Logowanie</h2>

<form method="post" action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/security/login.php">
    <label for="id_login">Login:</label>
    <input id="id_login" type="text" name="login" placeholder="Login" />

    <label for="id_password">Hasło:</label>
    <input id="id_password" type="password" name="password" placeholder="Hasło" />

    <input type="submit" value="Zaloguj" />
</form>

</body>
</html>
<?php }
}
