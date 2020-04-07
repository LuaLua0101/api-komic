<!DOCTYPE html>
<html lang="en">
@include('admin.components.head')
<link href="{{ asset('public/admins/assets/pages/css/login-2.min.css') }}" rel="stylesheet" type="text/css" />
<body class=" login">
    <!-- BEGIN LOGO -->
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" method="POST" action="{{ route('adpostLogin') }}">
            {{ csrf_field() }}
            <div class="form-title">
                <span class="form-title">Welcome.</span>
                <span class="form-subtitle">Please login.</span>
            </div>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter any username and password. </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Username" name="email" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
            <div class="form-actions">
                <button type="submit" class="btn red btn-block uppercase">Login</button>
            </div>
        </form>
        <!-- END LOGIN FORM -->
    </div>
    @include('admin.components.script')
</body>
</html>
