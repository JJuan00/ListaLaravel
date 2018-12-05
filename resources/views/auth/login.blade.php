<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('style.style')
    <title>Inicio</title>
</head>
<body>
      <div class="limiter">
        <div class="container-login100">
          <div class="wrap-login100 p-t50 p-b90">
              <form method="POST" class="login100-form validate-form flex-sb flex-w" action="{{ route('login') }}">
                @csrf
              <span class="login100-form-title p-b-51">
                Inicio de sesi&oacute;n
              </span>
              <div class="wrap-input100 validate-input m-b-16" data-validate = "Password requerida">
                <input type="text" name="email" placeholder="Ingese su email" class="input100">
                <span class="focus-input100"></span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="wrap-input100 validate-input m-b-16" data-validate = "Password requerida">
                <input type="password" name="password" placeholder="Ingese su contrase&ntilde;a" class="input100">
                <span class="focus-input100"></span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="flex-sb-m w-full p-t-3 p-b-24">
                <div class="contact100-form-checkbox">
                  <input type="checkbox" name="remember-me" class="input-checkbox100" id="ckb1">
                  <label class="label-checkbox100" id="ckb1">Recuerdame</label>
                </div>
                <div>
                  <a href="{{ route('register') }}" class="txt1">Registrate</a>
                </div>
              </div>
              <div class="container-login100-form-btn m-t-17">
                <button class="login100-form-btn">
                  Inicia sesi&oacute;n
                </button>
              </div>
            </form>
            <!-- <a href="{{ route('register') }}">Register</a> -->
            <br>
            @if(session('status_incorrect'))
              <div class="alert alert-danger" align="center" role="alert">
                {{ session('status_incorrect') }}
              </div>
            @endif
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
        </div>
      </div>
      @include('style.tempjs')

</body>
</html>