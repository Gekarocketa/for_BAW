<?php require_once dirname(__FILE__) .'/../config.php'; ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator Kredytowy</title>
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/styles.css">
</head>
<body>
    <div class="container">
        <a href="<?php print(_APP_URL); ?>/app/logout.php" class="logout-link">Wyloguj się</a>

        <form action="<?php print(_APP_URL); ?>/app/calc.php" method="post">
            <label for="id_loanAmount">Kwota kredytu:</label>
            <input id="id_loanAmount" type="text" name="loanAmount" value="<?php if(isset($loanAmount)) print($loanAmount); ?>" /><br />
            <label for="id_loanPeriod">Okres kredytowania (lata):</label>
            <input id="id_loanPeriod" type="text" name="loanPeriod" value="<?php if(isset($loanPeriod)) print($loanPeriod); ?>" /><br />
            <label for="id_interestRate">Oprocentowanie (%):</label>
            <input id="id_interestRate" type="text" name="interestRate" value="<?php if(isset($interestRate)) print($interestRate); ?>" /><br />
            <input type="submit" value="Oblicz" />
        </form>

        <?php
        if (isset($messages) && count($messages) > 0) {
            echo '<ol>';
            foreach ($messages as $key => $msg) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ol>';
        }
        ?>

        <?php if (isset($result)) { ?>
            <div class="result">
                <?php echo 'Wynik: '.$result.' zł miesięcznie'; ?>
            </div>
        <?php } ?>
    </div>
</body>
</html>