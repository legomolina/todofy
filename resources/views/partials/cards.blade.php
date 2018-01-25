@extends("main")

@section("main-content")
    <main role="main" class="mdc-toolbar-fixed-adjust">
        <div class="select-container">
            <div class="mdc-select" id="view" role="listbox" style="width: 150px">
                <div class="mdc-select__surface" tabindex="0">
                    <div class="mdc-select__label">Ver</div>
                    <div class="mdc-select__selected-text"></div>
                    <div class="mdc-select__bottom-line"></div>
                </div>

                <div class="mdc-simple-menu mdc-select__menu">
                    <ul class="mdc-list mdc-simple-menu__items">
                        <li class="mdc-list-item" role="option" tabindex="0">
                            Todas
                        </li>
                        <li class="mdc-list-item" role="option" tabindex="0">
                            Mías
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            @forelse ($notes as $note)

                <div class="mdc-card card" data-token="{{ $note->token }}">
                    <section class="mdc-card__media header" style="background-color: {{ $note->color }}">
                        <h1 class="mdc-card__title--large">{{ $note->title }}</h1>
                    </section>

                    <section class="mdc-card__primary">
                        <section class="mdc-card__supporting-text">
                            {{ $note->body }}
                        </section>
                    </section>


                    <section class="mdc-card__actions">
                        @if ($note->user_id == \Illuminate\Support\Facades\Auth::id())
                            <a href="/note/{{ $note->token }}"
                               class="mdc-button mdc-button--compact mdc-ripple-surface mdc-card__action"
                               data-mdc-auto-init="MDCRipple">Modificar
                            </a>
                            <button class="mdc-button mdc-button--raised mdc-ripple-surface button-red mdc-card__action remove-note"
                                    data-mdc-auto-init="MDCRipple">Borrar
                            </button>

                            @if ($note->visibility == 1)
                                <i class="material-icons card-visibility">language</i>
                            @endif

                        @else
                            <div class="card-user"><em>Usuario: {{ $note->user->name }}</em></div>
                        @endif
                    </section>
                </div>
            @empty
                <h1 style="width: 100%; text-align: center;" class="mdc-typography--display3">Aun no hay notas</h1>

                <p class="mdc-typography--body1"><a class="add-note" href="/note">Añadir una nota</a></p>
            @endforelse
        </div>
    </main>

    <form action="/note" method="get">
        <button class="mdc-fab material-icons app-fab--absolute" data-mdc-auto-init="MDCRipple"
                aria-label="Añadir nota">
            <span class="mdc-fab__icon">
                add
            </span>
        </button>
    </form>

    <aside id="remove-dialog"
           class="mdc-dialog"
           role="alertdialog"
           aria-labelledby="my-mdc-dialog-label"
           aria-describedby="my-mdc-dialog-description"
           data-card-token>
        <div class="mdc-dialog__surface">
            <header class="mdc-dialog__header">
                <h2 id="my-mdc-dialog-label" class="mdc-dialog__header__title">
                    ¿Seguro que quieres eliminar la nota?
                </h2>
            </header>
            <footer class="mdc-dialog__footer">
                <button type="button" class="mdc-button mdc-dialog__footer__button mdc-dialog__footer__button--cancel">
                    Cancelar
                </button>
                <button type="button" class="mdc-button mdc-dialog__footer__button mdc-dialog__footer__button--accept">
                    Aceptar
                </button>
            </footer>
        </div>
        <div class="mdc-dialog__backdrop"></div>
    </aside>

    <script>
        var dialog = new mdc.dialog.MDCDialog(document.querySelector('#remove-dialog'));

        mdc.select.MDCSelect.attachTo(document.getElementById('view'));

        dialog.listen('MDCDialog:accept', function () {
            var id = $(this).attr("data-card-token");
            var card = $(".card").filter(function (index, el) {
                return $(el).attr("data-token") === id;
            });

            $.ajax({
                url: "/note/" + id,
                method: "delete",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function () {
                    card.remove();
                },
                fail: function (request) {
                    console.log(request);
                }
            });

            dialog.close();
        });

        dialog.listen('MDCDialog:cancel', function () {
            dialog.close();
        });

        $(".remove-note").on("click", function (evt) {
            dialog.lastFocusedTarget = evt.target;
            $("#remove-dialog").attr("data-card-token", $(this).parents(".card").attr("data-token"));
            dialog.show();
        });
    </script>
@endsection
