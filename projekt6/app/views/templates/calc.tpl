<!DOCTYPE html>
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
<p>Zalogowano jako: ({$role|default:"brak"}) | <a href="index.php?action=logout">Wyloguj się</a></p>

<form method="post" action="index.php?action=calc">
    <div class="form-group">
        <label for="loanAmount">Kwota kredytu:</label>
        <input type="text" name="loanAmount" value="{$form.loanAmount|escape}">
    </div>

    <div class="form-group">
        <label for="loanPeriod">Okres kredytowania (lata):</label>
        <input type="text" name="loanPeriod" value="{$form.loanPeriod|escape}">
    </div>

    <div class="form-group">
        <label for="interestRate">Oprocentowanie (%):</label>
        <input type="text" name="interestRate" value="{$form.interestRate|escape}">
    </div>

    <button type="submit" class="btn">Oblicz</button>
</form>

{if isset($messages) && $messages|@count > 0}
    <div class="messages">
        <ul>
        {foreach from=$messages item=msg}
            <li>{$msg}</li>
        {/foreach}
        </ul>
    </div>
{/if}

{if isset($result.monthlyPayment)}
    <h3>Wynik: {$result.monthlyPayment} zł miesięcznie</h3>
{/if}

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
