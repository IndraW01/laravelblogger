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
    <title>Sign up</title>
  </head>
  <body>
    <div class="container-main">
      <div class="forms-container">

        <div class="signin-signup regis">

            @if (session()->has('success'))
            <div class="alert-status">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}" class="sign-up-form">
                @csrf
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input name="name" type="text" placeholder="name" value="{{ old('name') }}" />
                </div>
                @error('name')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                @enderror
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input name="email" type="email" placeholder="Email" value="{{ old('email') }}" />
                </div>
                @error('email')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                @enderror
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" placeholder="Password" />
                </div>
                @error('password')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                @enderror
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input name="password_confirmation" type="password" placeholder="Confirm Password" />
                </div>
                @error('password_confirmation')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                @enderror
                <button type="submit" class="btn solid">Sign up</button>

            </form>

        </div>
      </div>

      <div class="panels-container">

        <div class="panel right-panel">
            <div class="content">
                <h3>Sudah Punya Akun ?</h3>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                laboriosam ad deleniti.
                </p>
                <a href="{{ route('login.index') }}">
                    <button class="btn transparent" id="sign-in-btn">
                    Sign in
                    </button>
                </a>
                <a href="{{ route('blogs.index') }}" style="display: block; margin-top:10px;">
                    <button class="btn transparent" id="sign-in-btn">
                        Back
                    </button>
                </a>
            </div>
            <img src="img/register.svg" class="image" alt="" />
        </div>

      </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
