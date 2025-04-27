<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Aplikacja bazodanowa</title>
    <link rel="stylesheet"
          href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
          integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css">

</head>
<body style="margin:20px;">

<div class="pure-menu pure-menu-horizontal bottom-margin">
    <a href="{$conf->app_url}/index.php?action=personList"
       class="pure-menu-heading pure-menu-link">
       Lista
    </a>
    {if count($conf->roles)>0}
    <ul class="pure-menu-list">
        {foreach $conf->roles as $r}
            <li class="pure-menu-item">{$r}</li>
        {/foreach}
    </ul>
    {/if}
</div>

{block name=top}{/block}

{block name=bottom}{/block}

</body>
</html>
