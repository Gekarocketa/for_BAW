<?php
/* Smarty version 5.4.2, created on 2025-04-14 00:29:12
  from 'file:calc.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67fc3ab8740749_65159382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bcd601626fe7d4edfa1738959799dd73d550e41' => 
    array (
      0 => 'calc.tpl',
      1 => 1744583342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67fc3ab8740749_65159382 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Games\\xamp\\htdocs\\projekt6\\app\\views\\templates';
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
        .form-group { margin-bottom: 1em; }
        label { display: block; font-weight: bold; }
        input { width: 100%; padding: 0.5em; font-size: 1em; }
        .btn { padding: 0.5em 1em; background: #8bc34a; color: white; border: none; cursor: pointer; }
        .messages { margin-top: 1em; color: red; }
        .info { color: green; }
    </style>
</head>
<body class="is-preload">

<h2>Kalkulator kredytowy</h2>
<p>Zalogowano jako: (<?php echo (($tmp = $_smarty_tpl->getValue('role') ?? null)===null||$tmp==='' ? "brak" ?? null : $tmp);?>
) | <a href="index.php?action=logout">Wyloguj się</a></p>

<form method="post" action="index.php?action=calc">
    <div class="form-group">
        <label for="loanAmount">Kwota kredytu:</label>
        <input type="text" name="loanAmount" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('form')['loanAmount'], ENT_QUOTES, 'UTF-8', true);?>
">
    </div>

    <div class="form-group">
        <label for="loanPeriod">Okres kredytowania (lata):</label>
        <input type="text" name="loanPeriod" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('form')['loanPeriod'], ENT_QUOTES, 'UTF-8', true);?>
">
    </div>

    <div class="form-group">
        <label for="interestRate">Oprocentowanie (%):</label>
        <input type="text" name="interestRate" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('form')['interestRate'], ENT_QUOTES, 'UTF-8', true);?>
">
    </div>

    <button type="submit" class="btn">Oblicz</button>
</form>

<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
    <div class="messages">
        <ul>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
            <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
<?php }?>

<?php if ((null !== ($_smarty_tpl->getValue('result')['monthlyPayment'] ?? null))) {?>
    <h3>Wynik: <?php echo $_smarty_tpl->getValue('result')['monthlyPayment'];?>
 zł miesięcznie</h3>
<?php }?>

<?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/browser.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
