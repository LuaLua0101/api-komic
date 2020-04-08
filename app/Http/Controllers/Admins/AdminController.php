<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return redirect()->route('adgetLogin');
    }

    public function getLogin()
    {
        if (auth()->check()) {
            if (Auth::user()->admin == 1) {
                return redirect()->route('adgetHome');
            } else {
                return view('admin.login');
            }
        } else {
            return view('admin.login');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('adgetLogin');
    }

    public function postLogin(Request $request)
    {
        // dd(Hash::make($request->input('password')));
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            if (Auth::user()->admin == 1) {
                toastr()->success('Đăng nhập thành công');
                return 200;
            } else {
                toastr()->error('Tài khoản không có quyền truy cập');
                return 401;
            }
        } else {
            toastr()->error('Mật khẩu hoặc tài khoản không đúng');
            return 401;
        }
    }

    public function getHome()
    {
        return view('admin.index');
    }
}