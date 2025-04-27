<?php
/* Smarty version 5.4.2, created on 2025-04-27 16:03:33
  from 'file:PersonList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_680e3935cffe66_89859346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce9876d809c6bdf9bb3663171c88ef411665ebf8' => 
    array (
      0 => 'PersonList.tpl',
      1 => 1745762611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_680e3935cffe66_89859346 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Games\\xamp\\htdocs\\projekt6\\app\\views';
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8"/>
    <title>Baza Danych: lista osób</title>

    <!-- PureCSS -->
    <link rel="stylesheet"
          href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
          integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w"
          crossorigin="anonymous"/>

    <!-- Ваши стили -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/css/main.css"/>

    <style>
      .filter-buttons input[type="radio"] { display: none; }
      .filter-buttons label {
        margin-right: .5em;
        cursor: pointer;
        user-select: none;
      }
      .filter-buttons label.pure-button {
        background: #f4f4f4;
        color: #333;
        border: 1px solid #ccc;
      }
      .filter-buttons label.active {
        background: #1f8ceb;
        color: #fff;
        border-color: #1f8ceb;
      }
    </style>
</head>
<body class="is-preload">

<header>
  <nav>
    <a href="<?php echo $_smarty_tpl->getValue('app_url');?>
/index.php?action=calc"
       class="pure-button button-secondary"
       style="margin-right:1em;">
      Powrót do kalkulatora
    </a>
    <a href="<?php echo $_smarty_tpl->getValue('app_url');?>
/index.php?action=logout"
       class="pure-button button-secondary">
      Wyloguj się
    </a>
  </nav>
</header>

<main class="content">
  <h2>Baza Danych: lista osób</h2>

  <form class="pure-form pure-form-stacked"
        action="<?php echo $_smarty_tpl->getValue('app_url');?>
/index.php"
        method="get">
    <input type="hidden" name="action" value="personList">
    <fieldset>
      <div class="pure-control-group">
        <input type="text"
               name="sf_value"
               placeholder="Wpisz wartość"
               value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('searchForm')['value'], ENT_QUOTES, 'UTF-8', true);?>
"
               style="width:100%;"/>
      </div>

      <div class="filter-buttons">
        <label class="pure-button<?php if ($_smarty_tpl->getValue('searchForm')['field'] == 'name') {?> active<?php }?>">
          <input type="radio" name="sf_field" value="name"
                 <?php if ($_smarty_tpl->getValue('searchForm')['field'] == 'name') {?>checked<?php }?>>
          Po imieniu
        </label>
        <label class="pure-button<?php if ($_smarty_tpl->getValue('searchForm')['field'] == 'surname') {?> active<?php }?>">
          <input type="radio" name="sf_field" value="surname"
                 <?php if ($_smarty_tpl->getValue('searchForm')['field'] == 'surname') {?>checked<?php }?>>
          Po nazwisku
        </label>
        <label class="pure-button<?php if ($_smarty_tpl->getValue('searchForm')['field'] == 'birthdate') {?> active<?php }?>">
          <input type="radio" name="sf_field" value="birthdate"
                 <?php if ($_smarty_tpl->getValue('searchForm')['field'] == 'birthdate') {?>checked<?php }?>>
          Po dacie
        </label>
      </div>

      <button type="submit" class="pure-button pure-button-primary"
              style="margin-top:1em;">
        Filtruj
      </button>
    </fieldset>
  </form>

  <div class="bottom-margin" style="margin-top:1em;">
    <a class="pure-button button-success"
       href="<?php echo $_smarty_tpl->getValue('app_url');?>
/index.php?action=personNew">
      + Nowa osoba
    </a>
  </div>

  <table class="pure-table pure-table-bordered">
    <thead>
      <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Data ur.</th>
        <th>Opcje</th>
      </tr>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('people'), 'p');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('p')->value) {
$foreach0DoElse = false;
?>
      <tr>
        <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('p')['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
        <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('p')['surname'], ENT_QUOTES, 'UTF-8', true);?>
</td>
        <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('p')['birthdate'], ENT_QUOTES, 'UTF-8', true);?>
</td>
        <td>
          <a href="<?php echo $_smarty_tpl->getValue('app_url');?>
/index.php?action=personEdit&id=<?php echo $_smarty_tpl->getValue('p')['idperson'];?>
"
             class="pure-button">Edytuj</a>
          <a href="<?php echo $_smarty_tpl->getValue('app_url');?>
/index.php?action=personDelete&id=<?php echo $_smarty_tpl->getValue('p')['idperson'];?>
"
             class="pure-button button-warning">Usuń</a>
        </td>
      </tr>
      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </tbody>
  </table>
</main>

<footer>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>$(function(){ $('.scrolly').scrolly(); });<?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/util.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/main.js"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
>
    $('.filter-buttons label').on('click', function(){
      $('.filter-buttons label').removeClass('active');
      $(this).addClass('active');
    });
  <?php echo '</script'; ?>
>
</footer>

</body>
</html>
<?php }
}
