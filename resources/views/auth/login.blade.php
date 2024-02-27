<!doctype html>
<html lang="en">

<head>
    <title>ورود به سیستم</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('login-style.css') }}">
    <style>
        *{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif!important;
        }
    </style>
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="login-wrap p-4">
                            <div class="d-flex">
                                <div class="w-100 text-center">
                                    <img class="pt-0 mt-0 img-fluid rounded-circle" src="{{ asset('logo\blank.png') }}" alt="" width="120" height="120">
                                    <h4 class="text-center" style="color: #144ba3;"><b>Test System</i></b></h4>
                                    <h5 class="text-center font-weight-bolder ">Login To System</h5>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="signin-form">
                                @csrf
                                <div class="form-group mb-3 rtl">
                                    <label class="label" for="name">ایمیل کاربر</label>
                                    <input type="email"  name="email" class="form-control rtl @error('email') is-invalid @enderror" autocomplete="email" placeholder="ایمیل خود را وارد نمایید" required value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>ایمیل یا رمز عبور شما اشتباه میباشد</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 rtl">
                                    <label class="label" for="password">رمز کاربر</label>
                                    <input type="password"  id="password" name="password" class="form-control rtl @error('password') is-invalid @enderror" autocomplete="current-password" placeholder="رمز خود را وارد نمایید" required>
                                    <span id="toShowPassword" style="float:left; font-size: 1.1rem; margin-top: -2.1rem; margin-left: 0.6rem;" class="fa fa-eye"></span>
                                    <span id="toHidePassword" style="float:left; font-size: 1.1rem; margin-top: -2.1rem; margin-left: 0.6rem;" class="fa fa-eye-slash d-none"></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>ایمیل یا رمز عبور شما اشتباه میباشد</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3 font-weight-bolder">ورود به سیستم</button>
                                </div>
                            </form>
                        </div>
                        <div class="img" style="background-image: url('logo/bg_login.jpg');">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<script src="{{ asset('jquery-3.7.0.min.js') }}"></script>
<script>
    $('#toShowPassword').click(function() {
        $('#toShowPassword').addClass('d-none');
        $('#toHidePassword').removeClass('d-none');
        $('#password').attr('type', 'text');
    });
    $('#toHidePassword').click(function() {
        $('#toShowPassword').removeClass('d-none');
        $('#toHidePassword').addClass('d-none');
        $('#password').attr('type', 'password');
    });

    var timeout = ({{ config('session.lifetime') }} * 60000) - 10000;
    setTimeout(function() {
        window.location.reload(1);
    }, timeout);
</script>

</html>
