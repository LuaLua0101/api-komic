<!DOCTYPE html>
<html lang="en">
@include('admin.components.head')
<link href="{{ asset('public/admins/assets/pages/css/login.min.css') }}" rel="stylesheet" type="text/css" />
<body class=" login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.html">
            <img src="../assets/pages/img/logo-big.png" alt="" /> </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form action="javascript:;" class="login-form" id="login-form" name="login-form" method="post">
            {{ csrf_field() }}
            <h3 class="form-title font-green">Sign In</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter any username and password. </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
            <div class="form-actions">
                <button type="submit" class="btn green uppercase" onclick="login()">Login</button>
                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
            </div>
            <div class="create-account">
                <p>
                    <a href="javascript:;" id="register-btn" class="uppercase"></a>
                </p>
            </div>
        </form>
        <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" id="forget-form" name="forget-form" action="javascript:;" method="post">
            {{ csrf_field() }}
            <h3 class="font-green">Forget Password ?</h3>
            <p> Enter your e-mail address below to reset your password. </p>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->
    </div>
    <div class="copyright"> 2020 © Sylencer (NAD). </div>
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
