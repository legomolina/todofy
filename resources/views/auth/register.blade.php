@extends('main')

@section('main-content')
    <main role="main" class="mdc-toolbar-fixed-adjust">
        <div class="container">
            <h1 style="width: 100%; text-align: center">Registro</h1>

            <form class="login-form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="mdc-text-field mdc-text-field--upgraded">
                        <input id="name" aria-controls="my-text-field-helper-text" type="text"
                               class="mdc-text-field__input" name="name" value="{{ old('name') }}" required autofocus>
                        <label for="name" class="mdc-text-field__label">Nombre</label>
                        <div class="mdc-text-field__bottom-line" style="transform-origin: 45.5px center"></div>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="mdc-text-field mdc-text-field--upgraded">
                        <input id="email" aria-controls="my-text-field-helper-text" type="email"
                               class="mdc-text-field__input" name="email" value="{{ old('email') }}" required autofocus>
                        <label for="name" class="mdc-text-field__label">Email</label>
                        <div class="mdc-text-field__bottom-line" style="transform-origin: 45.5px center"></div>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="mdc-text-field mdc-text-field--upgraded">
                        <input aria-controls="my-text-field-helper-text" id="password" type="password"
                               class="mdc-text-field__input" name="password" required>
                        <label for="password" class="mdc-text-field__label">Contraseña</label>
                        <div class="mdc-text-field__bottom-line" style="transform-origin: 45.5px center"></div>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="mdc-text-field mdc-text-field--upgraded">
                        <input aria-controls="my-text-field-helper-text" id="password-confirm" type="password"
                               class="mdc-text-field__input" name="password_confirmation" required>
                        <label for="password-confirm" class="mdc-text-field__label">Contraseña</label>
                        <div class="mdc-text-field__bottom-line" style="transform-origin: 45.5px center"></div>
                    </div>

                    <div class="center-middle">
                        <input type="submit" class="mdc-button mdc-button--raised mdc-ripple-upgraded"
                               data-mdc-auto-init="MDCRipple" value="Entrar">
                    </div>
                </div>
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