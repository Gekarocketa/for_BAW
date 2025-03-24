<?php require_once dirname(__FILE__, 3) .'/config.php'; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Logowanie</title>
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Logowanie</h2>
        <form method="post" action="">
            <label for="id_login">Login:</label>
            <input id="id_login" type="text" name="login" /><br />
            <label for="id_password">Hasło:</label>
            <input id="id_password" type="password" name="password" /><br />
            <input type="submit" value="Zaloguj" />
        </form>

        <?php
        if (!empty($messages)) {
            echo '<ol>';
            foreach ($messages as $msg) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ol>';
        }
        ?>
    </div>
</body>
</html>