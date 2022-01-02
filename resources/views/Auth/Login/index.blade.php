<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}" />
    <title>Sign in</title>
  </head>
  <body>
    <div class="container-main">
      <div class="forms-container">
        <div class="signin-signup">
            @if (session()->has('failed'))
            <div class="alert-status">
                <div class="alert alert-danger" role="alert">
                    {{ session('failed') }}
                </div>
            </div>
            @endif
          <form action="{{ route('login.check') }}" method="POST" class="sign-in-form">
            @csrf
            <h2 class="title">Sign in</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input name="name" type="text" placeholder="name" value="{{ old('name') }}" />
            </div>
            @error('name')
                <p class="text-danger"><small>{{ $message }}</small></p>
            @enderror
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Password" />
            </div>
            @error('password')
                <p class="text-danger"><small>{{ $message }}</small></p>
            @enderror
            <button type="submit" class="btn solid">Login</button>
          </form>

        </div>
      </div>

      <div class="panels-container">

        <div class="panel left-panel">
          <div class="content">
            <h3>Belum Punya Akun ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <a href="{{ route('register.index') }}">
                <button class="btn transparent" id="sign-up-btn">
                    Sign up
                </button>
            </a>
            <a href="{{ route('blogs.index') }}" style="display: block; margin-top:10px;">
                <button class="btn transparent" id="sign-up-btn">
                    Back
                </button>
            </a>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>

      </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
