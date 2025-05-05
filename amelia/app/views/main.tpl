<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Big Picture by HTML5 UP</title>

    {** CSS **}
    <link rel="stylesheet" href="{$conf->app_url}/css/main.css" />
    <noscript>
      <link rel="stylesheet" href="{$conf->app_url}/css/noscript.css" />
    </noscript>

    {** Если кто-то заходит на index.html напрямую — перенаправляем на index.php **}
    <script>
        const isHtml = window.location.pathname.endsWith("index.html");
        const isPhp  = window.location.pathname.endsWith("index.php") || window.location.search.includes("action");
        if (isHtml && !isPhp) {
            window.location.replace("index.php");
        }
    </script>
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
                {** При сабмите ведём сразу на ?action=calc **}
                <form method="get" action="{$conf->action_root}calc">
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

    {** JS **}
    <script src="{$conf->app_url}/js/error.js"             defer></script>
    <script src="{$conf->app_url}/js/jquery.min.js"        defer></script>
    <script src="{$conf->app_url}/js/jquery.poptrox.min.js" defer></script>
    <script src="{$conf->app_url}/js/jquery.scrolly.min.js" defer></script>
    <script src="{$conf->app_url}/js/jquery.scrollex.min.js" defer></script>
    <script src="{$conf->app_url}/js/browser.min.js"       defer></script>
    <script src="{$conf->app_url}/js/breakpoints.min.js"   defer></script>
    <script src="{$conf->app_url}/js/util.js"              defer></script>
    <script src="{$conf->app_url}/js/main.js"              defer></script>

</body>
</html>
ы