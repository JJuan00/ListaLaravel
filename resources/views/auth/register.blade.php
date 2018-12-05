<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      @include('style.style')
      <title>Registro</title>
  </head>
  <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-t50 p-b90">
                    <form class="login100-form validate-form flex-sb flex-w" action="{{ route('register') }}" method="POST">
                        @csrf
                        <span class="login100-form-title p-b-51">
                            Registro de usuario
                        </span>

                        <div class="wrap-input100 validate-input m-b-16" data-validate="Nombre requerido">
                            <input type="text" name="name" class="input100" placeholder="Nombre(s)" autocomplete="off">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Email requerido">
                            <input type="email" name="email" placeholder="Ingrese email" class="input100">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Contrase&ntilde;a requerida">
                            <input type="password" name="password" class="input100" placeholder="Ingrese contrase&ntilde;a">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Contrase&ntilde;a requerida">
                            <input type="password" name="password_confirmation" class="input100" placeholder="Repetir contrase&ntilde;a">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="flex-sb-m w-full p-t-3 p-b-24">
                            <div>
                                <a href="{{ route('login') }}" class="txt1">Inicia sesi&oacute;n</a>
                            </div>
                        </div>
                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn">
                                Registrate
                            </button>
                        </div>
                    </form>
                    @if(session('status'))
                        <div class="alert alert-danger" align="center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @include('style.tempjs')
    </body>
</html>

