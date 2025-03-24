<!-- login.thl -->
<html>
<head>
    <meta charset="utf-8">
    <title>Logowanie</title>
    <!-- Jeśli używasz Big Picture, link do stylu -->
    <link rel="stylesheet" href="{$app_url}/assets/css/main.css">
</head>
<body>

{* Wyświetlamy ewentualne komunikaty o błędach *}
{if isset($messages) && $messages|@count > 0}
    <ul style="color: red;">
    {foreach $messages as $m}
        <li>{$m}</li>
    {/foreach}
    </ul>
{/if}

<h2>Logowanie</h2>

<form method="post" action="{$app_url}/app/security/login.php">
    <label for="id_login">Login:</label>
    <input id="id_login" type="text" name="login" placeholder="Login" />

    <label for="id_password">Hasło:</label>
    <input id="id_password" type="password" name="password" placeholder="Hasło" />

    <input type="submit" value="Zaloguj" />
</form>

</body>
</html>
