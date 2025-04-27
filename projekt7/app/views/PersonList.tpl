<!DOCTYPE html>
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
    <link rel="stylesheet" href="{$app_url}/assets/css/main.css"/>

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
    <a href="{$app_url}/index.php?action=calc"
       class="pure-button button-secondary"
       style="margin-right:1em;">
      Powrót do kalkulatora
    </a>
    <a href="{$app_url}/index.php?action=logout"
       class="pure-button button-secondary">
      Wyloguj się
    </a>
  </nav>
</header>

<main class="content">
  <h2>Baza Danych: lista osób</h2>

  <form class="pure-form pure-form-stacked"
        action="{$app_url}/index.php"
        method="get">
    <input type="hidden" name="action" value="personList">
    <fieldset>
      <div class="pure-control-group">
        <input type="text"
               name="sf_value"
               placeholder="Wpisz wartość"
               value="{$searchForm.value|escape}"
               style="width:100%;"/>
      </div>

      <div class="filter-buttons">
        <label class="pure-button{if $searchForm.field=='name'} active{/if}">
          <input type="radio" name="sf_field" value="name"
                 {if $searchForm.field=='name'}checked{/if}>
          Po imieniu
        </label>
        <label class="pure-button{if $searchForm.field=='surname'} active{/if}">
          <input type="radio" name="sf_field" value="surname"
                 {if $searchForm.field=='surname'}checked{/if}>
          Po nazwisku
        </label>
        <label class="pure-button{if $searchForm.field=='birthdate'} active{/if}">
          <input type="radio" name="sf_field" value="birthdate"
                 {if $searchForm.field=='birthdate'}checked{/if}>
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
       href="{$app_url}/index.php?action=personNew">
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
      {foreach $people as $p}
      <tr>
        <td>{$p.name|escape}</td>
        <td>{$p.surname|escape}</td>
        <td>{$p.birthdate|escape}</td>
        <td>
          <a href="{$app_url}/index.php?action=personEdit&id={$p.idperson}"
             class="pure-button">Edytuj</a>
          <a href="{$app_url}/index.php?action=personDelete&id={$p.idperson}"
             class="pure-button button-warning">Usuń</a>
        </td>
      </tr>
      {/foreach}
    </tbody>
  </table>
</main>

<footer>
  <script src="{$app_url}/assets/js/jquery.min.js"></script>
  <script src="{$app_url}/assets/js/jquery.scrolly.min.js"></script>
  <script>$(function(){ $('.scrolly').scrolly(); });</script>
  <script src="{$app_url}/assets/js/jquery.scrollex.min.js"></script>
  <script src="{$app_url}/assets/js/browser.min.js"></script>
  <script src="{$app_url}/assets/js/breakpoints.min.js"></script>
  <script src="{$app_url}/assets/js/util.js"></script>
  <script src="{$app_url}/assets/js/main.js"></script>

  <script>
    $('.filter-buttons label').on('click', function(){
      $('.filter-buttons label').removeClass('active');
      $(this).addClass('active');
    });
  </script>
</footer>

</body>
</html>
