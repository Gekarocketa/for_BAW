<?php
/* Smarty version 5.4.2, created on 2025-03-31 02:07:33
  from 'file:CalcView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67e9dcc5ea2625_79460335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '718ea3f6e93b056c892125afa594a12b5e467a45' => 
    array (
      0 => 'CalcView.tpl',
      1 => 1743379642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e9dcc5ea2625_79460335 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Games\\xamp\\htdocs\\projekt3.22\\templates';
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kalkulator kredytowy</title>
</head>
<body>
    <h1>Kalkulator kredytowy</h1>
    <form action="calc.php" method="post">
        <label for="amount">Kwota kredytu:</label>
        <input type="text" id="amount" name="amount" value="<?php echo (($tmp = $_smarty_tpl->getValue('form')->amount ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" /><br/>

        <label for="interest">Oprocentowanie (%):</label>
        <input type="text" id="interest" name="interest" value="<?php echo (($tmp = $_smarty_tpl->getValue('form')->interest ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" /><br/>

        <label for="years">Okres spłaty (lata):</label>
        <input type="text" id="years" name="years" value="<?php echo (($tmp = $_smarty_tpl->getValue('form')->years ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" /><br/>

        <input type="submit" value="Oblicz" />
    </form>

    <?php if ($_smarty_tpl->getValue('messages')) {?>
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
    <?php }?>

    <?php if ((null !== ($_smarty_tpl->getValue('result')->monthlyPayment ?? null))) {?>
        <h2>Wynik</h2>
        <p>Miesięczna rata: <?php echo $_smarty_tpl->getValue('result')->monthlyPayment;?>
</p>
    <?php }?>
</body>
</html>
<?php }
}
