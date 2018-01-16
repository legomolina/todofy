<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="css/material-components-web.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<header class="mdc-toolbar mdc-toolbar--fixed mdc-toolbar--waterfall">
    <div class="mdc-toolbar__row">
        <section class="mdc-toolbar__section mdc-toolbar__section--align-start">
            <span class="mdc-toolbar__title">Todofy</span>
        </section>

        <section class="mdc-toolbar__section mdc-toolbar__section--align-end" role="toolbar">
            <a href="#" class="material-icons mdc-toolbar__icon" aria-label="Bookmark this page" alt="Cerrar sesión">exit_to_app</a>
        </section>
    </div>
</header>

<main role="main" class="mdc-toolbar-fixed-adjust">
    <div class="container">
        <div class="mdc-card card">
            <section class="mdc-card__media header">
                <h1 class="mdc-card__title--large">Title goes here</h1>
            </section>

            <section class="mdc-card__primary">
                <section class="mdc-card__supporting-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc rhoncus,
                    ipsum eget consequat molestie, metus lacus tempus sem, ac varius quam felis ac neque. Suspendisse
                    sed finibus nibh. Quisque eget arcu massa. Vestibulum posuere mauris at pharetra pellentesque. Donec
                    consectetur, ex eget mollis lacinia, purus sapien varius ligula, id egestas ex dui at ex. Curabitur
                    convallis aliquam consequat. Duis non justo dignissim, laoreet tortor volutpat, tempus quam. Morbi
                    aliquam ligula id ornare vestibulum. Aliquam placerat eleifend laoreet. Suspendisse aliquet et risus
                    vel placerat. Integer in pellentesque ex. Duis nulla lacus, pulvinar sit amet ligula dignissim,
                    congue pulvinar magna.
                </section>
            </section>

            <section class="mdc-card__actions">
                <button class="mdc-button mdc-button--compact mdc-ripple-surface mdc-card__action" data-mdc-auto-init="MDCRipple">Modificar</button>
                <button class="mdc-button mdc-button--raised mdc-ripple-surface button-red mdc-card__action" data-mdc-auto-init="MDCRipple">Borrar</button>
            </section>
        </div>
    </div>
</main>

<button class="mdc-fab material-icons app-fab--absolute" data-mdc-auto-init="MDCRipple" aria-label="Añadir nota">
      <span class="mdc-fab__icon">
        add
      </span>
</button>

<script src="js/material-components-web.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>

<script>
    window.mdc.autoInit();

    var toolbar = mdc.toolbar.MDCToolbar.attachTo(document.querySelector('.mdc-toolbar'));
    toolbar.fixedAdjustElement = document.querySelector('.mdc-toolbar-fixed-adjust');

    $(document).ready(function() {
        $()
    });
</script>

</body>
</html>
