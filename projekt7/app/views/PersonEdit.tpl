<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8"/>
    <title>Edytuj Osobę</title>

    <link rel="stylesheet"
          href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
          integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w"
          crossorigin="anonymous">

    <link rel="stylesheet" href="{$app_url}/assets/css/main.css"/>
</head>
<body class="is-preload">

<header>
    <nav>
            <a href="{$app_url}/index.php?action=logout">Wyloguj się</a>
    </nav>
</header>

<main class="content">
    <h2>Edytuj Osobę</h2>

    <form class="pure-form pure-form-aligned"
          action="{$app_url}/index.php?action=personSave"
          method="post">

        <fieldset>
            <legend>Dane Osoby</legend>

            <div class="pure-control-group">
                <label for="name">Imię</label>
                <input id="name"
                       type="text"
                       name="name"
                       placeholder="Imię"
                       value="{$form.name|escape}">
            </div>

            <div class="pure-control-group">
                <label for="surname">Nazwisko</label>
                <input id="surname"
                       type="text"
                       name="surname"
                       placeholder="Nazwisko"
                       value="{$form.surname|escape}">
            </div>

            <div class="pure-control-group">
                <label for="birthdate">Data ur.</label>
                <input id="birthdate"
                       type="date"
                       name="birthdate"
                       placeholder="YYYY-MM-DD"
                       value="{$form.birthdate|escape}">
            </div>

            <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">
                    Zapisz
                </button>
                <a href="{$app_url}/index.php?action=personList"
                   class="pure-button button-secondary">
                    Powrót
                </a>
            </div>
        </fieldset>

        <input type="hidden" name="id" value="{$form.id|escape}">
    </form>
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
</footer>

</body>
</html>
