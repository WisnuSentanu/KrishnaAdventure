<!DOCTYPE html>
<html lang="en">
<head>
<title>Login - Admin</title>

    <!-- head -->
    @include('layout.head')
</head>
<body class="login-page">
<div class="hold-transition login-box">
    <!-- <a href="{{asset('/')}}" class="background-container">
        <img src="{{asset('dist/img/GSE.jpg')}}" alt="background-container">
    </a> -->

    <div class="login-form">
        <a href="{{asset('/')}}" class="brand-link">
            <!-- <img src="{{asset('dist/img/ap-logo-sekunder.png')}}" alt="Gambar Logo" class="gambar-logo" style="width:280px;height:60px;"> -->
        </a>
        <a href="{{ url('index') }}">Login Admin<br></a>
    </div>
    <br>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Silahkan log in untuk memulai</p>

            <!-- pesan error, jika login gagal -->
            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session('loginError')}}
            </div>
            @endif

            <!-- form login -->
            <form action="{{url('/login/process')}}" method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="email" 
                           class="form-control" 
                           placeholder="Email" 
                           name="email"
                           required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" 
                           class="form-control" 
                           placeholder="Password"
                           name="password"
                           required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                </div>

                <!-- <div class="input-group mb-3">
                    <a href="{{ url('/register') }}" class="btn btn-secondary btn-block">Register</a>
                </div> -->
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>

<br>
<!--
<p class="mb-0">
    Belum punya akun? <a href="register.html" class="text-center">Daftar disini</a>
</p>
-->
</body>
</html>
