<?php
/* Smarty version 5.4.2, created on 2025-03-24 22:20:24
  from 'file:calc.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67e1cc98af2573_07377887',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fab3fd7860a79bae031260993e7eeee9701e8a5' => 
    array (
      0 => 'calc.tpl',
      1 => 1742848794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e1cc98af2573_07377887 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Games\\xamp\\htdocs\\projekt3.2\\templates';
?><html>
<head>
    <meta charset="utf-8">
    <title>Kalkulator Kredytowy</title>
    <!-- Przykład wczytania stylu (Big Picture lub inny) -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/css/main.css">
</head>
<body>
    <div>
        Zalogowano jako: <?php echo $_smarty_tpl->getValue('username');?>
 (<?php echo $_smarty_tpl->getValue('role');?>
)
        | <a href="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/security/logout.php">Wyloguj się</a>
    </div>

    <form action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="post">
        <label for="id_loanAmount">Kwota kredytu:</label>
        <input id="id_loanAmount" type="text" name="loanAmount" value="<?php echo $_smarty_tpl->getValue('loanAmount');?>
" /><br />

        <label for="id_loanPeriod">Okres kredytowania (lata):</label>
        <input id="id_loanPeriod" type="text" name="loanPeriod" value="<?php echo $_smarty_tpl->getValue('loanPeriod');?>
" /><br />

        <label for="id_interestRate">Oprocentowanie (%):</label>
        <input id="id_interestRate" type="text" name="interestRate" value="<?php echo $_smarty_tpl->getValue('interestRate');?>
" /><br />

        <input type="submit" value="Oblicz" />
    </form>

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
        <ol>
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
        </ol>
    <?php }?>

    <?php if ((null !== ($_smarty_tpl->getValue('result') ?? null))) {?>
        <div class="result">
            Wynik: <?php echo $_smarty_tpl->getValue('result');?>
 zł miesięcznie
        </div>
    <?php }?>
</body>
</html>
<?php }
}
