<?php
/* Smarty version 5.4.5, created on 2025-05-06 01:29:11
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_681949c7224466_60762689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c83b25f0d125b71bed24e6e09a7ede4070f8b51' => 
    array (
      0 => 'main.tpl',
      1 => 1746487746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_681949c7224466_60762689 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\Games\\xamp\\htdocs\\amelia\\app\\views';
?><!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Big Picture by HTML5 UP</title>

        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/main.css" />
    <noscript>
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/noscript.css" />
    </noscript>

        <?php echo '<script'; ?>
>
        const isHtml = window.location.pathname.endsWith("index.html");
        const isPhp  = window.location.pathname.endsWith("index.php") || window.location.search.includes("action");
        if (isHtml && !isPhp) {
            window.location.replace("index.php");
        }
    <?php echo '</script'; ?>
>
</head>

<body class="is-preload">

    <!-- Header -->
    <header id="header">
        <h1>Kalkulator Kredytowy</h1>
        <nav>
            <ul>
                <li><a href="#intro">Intro</a></li>
                <li><a href="#one">Info</a></li>
                <li><a href="#contact">Logowanie</a></li>
            </ul>
        </nav>
    </header>

    <!-- Intro -->
    <section id="intro" class="main style1 dark fullscreen">
        <div class="content">
            <header>
                <h2>Hey.</h2>
            </header>
            <p>Sprawdź swoje <strong>Raty Kredytu</strong> w kilka chwil!<br /></p>
            <footer>
                <a href="#one" class="button style2 down">More</a>
            </footer>
        </div>
    </section>

    <!-- One -->
    <section id="one" class="main style2 right dark fullscreen">
        <div class="content box style2">
            <header>
                <h2>Co robi ten kalkulator kredytowy?</h2>
            </header>
            <p>
                Dzięki niemu w kilka sekund oszacujesz wysokość miesięcznej raty,
                całkowity koszt kredytu oraz porównasz różne oferty.
                Wystarczy, że podasz kwotę, oprocentowanie i okres spłaty
                – resztę zrobi za Ciebie! Narzędzie jest proste w obsłudze,
                a wyniki pokazują szczegółowy harmonogram spłat.
                Sprawdź sam i zaplanuj swój budżet bez stresu!
            </p>
        </div>
        <a href="#contact" class="button style2 down anchored">Next</a>
    </section>

    <!-- Login -->
    <section id="contact" class="main style3 secondary">
        <div class="content">
            <header>
                <h2>Logowanie.</h2>
                <h1>Wpisz swój login / hasło.</h1>
            </header>
            <div class="box">
                                <form method="get" action="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
calc">
                    <div class="fields">
                        <div class="field half">
                            <input type="text" name="login" placeholder="Login" required />
                        </div>
                        <div class="field half">
                            <input type="password" name="pass" placeholder="Password" required />
                        </div>
                    </div>
                    <ul class="actions special">
                        <li><input type="submit" value="Zaloguj" /></li>
                    </ul>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="menu">
            <li>&copy; Yevhen Zaimenko</li>
            <li><a href="https://github.com/Gekarocketa/for_BAW" target="_blank">GitHub</a></li>
        </ul>
    </footer>

        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/js/error.js"             defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/js/jquery.min.js"        defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/js/jquery.poptrox.min.js" defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/js/jquery.scrolly.min.js" defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/js/jquery.scrollex.min.js" defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/js/browser.min.js"       defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/js/breakpoints.min.js"   defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/js/util.js"              defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/js/main.js"              defer><?php echo '</script'; ?>
>

</body>
</html>
ы<?php }
}
