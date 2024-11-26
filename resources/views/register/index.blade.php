<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPMB UMI</title>
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
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <h1>Buat Akun</h1>
                        <div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" name="name" class="form-control" placeholder="Username"
                                value="{{ @old('name') }}" />
                        </div>
                        <div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" name="email" class="form-control" placeholder="Email"
                                value="{{ @old('email') }}" />
                        </div>
                        <div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                value="{{ @old('password') }}" />
                        </div>
                        <div>
                            <button class="btn btn-info">Submit</button>
                        </div>
                        <div class="separator">
                            <p class="change_link">Sudah Punya Akun ?
                                <a href="{{ route ('login') }}" class="to_register"> Masuk </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> PPMB UMI</h1>
                                <p>©2024 All Rights Reserved. <br> Universitas Methosdist Indonesia.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
