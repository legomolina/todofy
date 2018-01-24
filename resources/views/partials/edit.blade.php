@extends("main")

@section("main-content")
    <main role="main" class="mdc-toolbar-fixed-adjust">
        <div class="container">
            <h1 style="width: 100%; text-align: center" class="mdc-typography--display3">{{ $options["action_text"] }}
                nota</h1>

            <form action="{{ $options["form_action"] }}" method="post"
                  class="note-form">
                <div class="mdc-text-field mdc-text-field--upgraded">
                    <input name="title" class="mdc-text-field__input" id="my-text-field"
                           aria-controls="my-text-field-helper-text" type="text" value="{{ $note->title or "" }}">
                    <label for="my-text-field" class="mdc-text-field__label">Titulo</label>
                    <div class="mdc-text-field__bottom-line" style="transform-origin: 45.5px center"></div>
                </div>

                <section id="demo-text-field-textarea-wrapper">
                    <div class="mdc-text-field mdc-text-field--textarea mdc-text-field--upgraded">
                        <textarea name="content" id="textarea" class="mdc-text-field__input" rows="8"
                                  cols="40" required>{{ $note->body or "" }}</textarea>
                        <label for="textarea" class="mdc-text-field__label">Texto</label>
                    </div>
                </section>

                @if (isset($note))
                    <input type="hidden" name="_method" value="PUT">
                @endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <button class="mdc-button mdc-button--raised mdc-ripple-upgraded" data-mdc-auto-init="MDCRipple">
                    {{ $options["action_text"] }}
                </button>

                <a href="/" class="mdc-button mdc-button--raised mdc-ripple-upgraded" data-mdc-auto-init="MDCRipple">
                    Cancelar
                </a>
            </form>
        </div>
    </main>

    <script>
        (function () {
            var tfs = document.querySelectorAll(
                '.mdc-text-field'
            );
            for (var i = 0, tf; tf = tfs[i]; i++) {
                mdc.textField.MDCTextField.attachTo(tf);
            }
        })();
    </script>
@endsection