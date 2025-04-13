<html>
<head>
    <meta charset="utf-8">
    <title>Kalkulator Kredytowy</title>
    <link rel="stylesheet" href="{$app_url}/assets/css/main.css">
</head>
<body>
    <div>
        Zalogowano jako: ({$role})
        | <a href="{$app_url}/app/security/logout.php">Wyloguj się</a>
    </div>

    <form action="{$app_url}/index.php?action=calc" method="post">
        <label for="id_loanAmount">Kwota kredytu:</label>
        <input id="id_loanAmount" type="text" name="loanAmount" value="{$form.loanAmount}" /><br />

        <label for="id_loanPeriod">Okres kredytowania (lata):</label>
        <input id="id_loanPeriod" type="text" name="loanPeriod" value="{$form.loanPeriod}" /><br />

        <label for="id_interestRate">Oprocentowanie (%):</label>
        <input id="id_interestRate" type="text" name="interestRate" value="{$form.interestRate}" /><br />

        <input type="submit" value="Oblicz" />
    </form>

    {if $messages|@count > 0}
        <ol>
        {foreach from=$messages item=msg}
            <li>{$msg}</li>
        {/foreach}
        </ol>
    {/if}

    {if isset($result)}
        <div class="result">
            Wynik: {$result.monthlyPayment} zł miesięcznie
        </div>
    {/if}
</body>
</html>
