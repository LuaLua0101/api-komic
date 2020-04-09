<!DOCTYPE html>
<html lang="en">
@include('admin.components.head')
<link href="{{ asset('public/admins/assets/pages/css/login-5.min.css') }}" rel="stylesheet" type="text/css" />
<body class=" login">
    <!-- BEGIN : LOGIN PAGE 5-2 -->
    <div class="user-login-5" style="background-color: #1fc8db;
    background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);">
        <div class="row bs-reset">
            <div class="col-md-6 login-container bs-reset">
                {{-- <img class="login-logo login-6" src="{{ asset('public/admins/background-login.png') }}" /> --}}
                <div class="login-content">
                    <h1>Balance Admin Login</h1>
                    <p style="color: #000"> Chào mừng đến với hệ thống quản trị của Balance </p>
                    <form action="javascript:;" class="login-form" id="login-form" name="login-form" method="post">
                        {{ csrf_field() }}
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <span>Vui lòng nhập email và password </span>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" type="email" autocomplete="off" placeholder="Username" name="email" required /> </div>
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required /> </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="rememberme mt-checkbox mt-checkbox-outline">
                                    {{-- <input type="checkbox" name="remember" value="1" /> Remember me
                                    <span></span> --}}
                                </label>
                            </div>
                            <div class="col-sm-8 text-right">
                                <div class="forgot-password">
                                    {{-- <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a> --}}
                                </div>
                                <button class="btn blue" type="submit" onclick="login()">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                    <!-- BEGIN FORGOT PASSWORD FORM -->
                    <form class="forget-form" id="forget-form" name="forget-form" action="javascript:;" method="post">
                        <h3>Quên mật khẩu ?</h3>
                        <p style="color: #000"> Mật khẩu mới sẽ được gửi qua email của bạn </p>
                        <div class="form-group">
                            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                        <div class="form-actions">
                            <button type="submit" class="btn blue uppercase pull-right" onclick="forgotPasswd()">Xác nhận</button>
                        </div>
                    </form>
                    <!-- END FORGOT PASSWORD FORM -->
                </div>
                {{-- <div class="login-footer">
                    <div class="row bs-reset">
                        <div class="col-xs-5 bs-reset">
                            <ul class="login-social">
                                <li>
                                    <a href="https://www.facebook.com/slykslyk">
                                        <i style="color: #000" class="icon-social-facebook"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-7 bs-reset">
                            <div class="login-copyright text-right">
                                <p style="color: #000">Copyright &copy; Keenthemes 2015</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-6 bs-reset">
                <div class="login-bg"> </div>
            </div>
        </div>
    </div>
    <!-- END : LOGIN PAGE 5-2 -->
</body>
<script>
    function login() {
        $.post("{{route('adpostLogin')}}"
                , $("#login-form").serialize()
            ).done(function(data) {
                if (data == 200)
                    window.location.href = "{{route('adgetHome')}}";
                else location.reload();
            })
            .fail(function() {
                alert("error");
            })
    }

    function forgotPasswd() {
        $.post("{{route('adpostForgotPass')}}"
                , $("#forget-form").serialize()
            ).done(function() {
                location.reload();
            })
            .fail(function() {
                alert("error");
            })
    }

</script>
@include('admin.components.script')
</body>
</html>
