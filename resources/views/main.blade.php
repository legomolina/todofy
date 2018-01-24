<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="/css/material-components-web.css" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="/js/material-components-web.js"></script>
    <script src="/js/jquery-3.2.1.min.js"></script>
</head>
<body>

<header class="mdc-toolbar mdc-toolbar--fixed mdc-toolbar--waterfall">
    <div class="mdc-toolbar__row">
        <section class="mdc-toolbar__section mdc-toolbar__section--align-start">
            <span class="mdc-toolbar__title">Todofy</span>
        </section>

        <section class="mdc-toolbar__section mdc-toolbar__section--align-end" role="toolbar">
            @if (\Illuminate\Support\Facades\Auth::guest())
                <a href="/login" class="mdc-toolbar__icon" aria-label="Login">Login</a>
                <a href="/register" class="mdc-toolbar__icon" aria-label="Register">Registrarse</a>
            @else
                <a href="/logout" class="material-icons mdc-toolbar__icon" aria-label="Cerrar sesión"
                   alt="Cerrar sesión">exit_to_app</a>
            @endif
        </section>
    </div>
</header>

@yield("main-content")

<script>
    window.mdc.autoInit();

    var toolbar = mdc.toolbar.MDCToolbar.attachTo(document.querySelector('.mdc-toolbar'));
    toolbar.fixedAdjustElement = document.querySelector('.mdc-toolbar-fixed-adjust');
</script>

</body>
</html>