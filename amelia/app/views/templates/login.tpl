<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel logowania</title>
    <link rel="stylesheet" href="{$app_url}/assets/css/login.css">
</head>
<body>
    <h2>Logowanie</h2>

    {if isset($error)}
        <p style="color:red;">{$error}</p>
    {/if}

    <form action="{$app_url}/app/security/login.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" /><br><br>

        <label for="pass">Hasło:</label>
        <input type="password" name="pass" id="pass" /><br><br>

        <input type="submit" value="Zaloguj się" />
    </form>
</body>
</html>
