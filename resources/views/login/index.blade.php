<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMB UMI</title>
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">
  </head>
  <body class="login" style="color: black">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
              <h1>Login Form</h1>
              <div>
                  @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                <input type="text" name="email" value="{{ @old('email') }}" class="form-control" placeholder="Email"/>
              </div>
              <div>
                  @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                <input type="password" name="password" {{ @old('password') }} class="form-control" placeholder="Password"/>
              </div>
              <div>
                <button class="btn btn-info">Masuk</button>
              </div>
              <div class="separator">
                <p class="change_link">Belum punya akun?
                  <a href="{{ route('register') }}" class="to_register"> Buat Akun </a>
                </p>
                <div>
                  <h1><i class="fa fa-paw"></i> PPMB UMI</h1>
                  <p>©2024 All Rights Reserved. <br>
                    Universitas Methodist Indonesia.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
