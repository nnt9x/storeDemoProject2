<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // GET: /admin/login
    function viewLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin-home');
        }
        return view('admin.login.login');
    }

    // POST: /admin/login
    function login(Request $request)
    {
        // Bước 1: Lấy dữ liệu từ
        $email = $request->input('email');
        $password = $request->input('password');

        // Bước 2: Đăng nhập
        if (Auth::guard('admin')->attempt([
            'email' => $email,
            'password' => $password
        ])) {
            // Chuyển hướng
//            $request->session()->regenerate();
            // Chuyển hướng về home admin
            return redirect()->route('admin-home');

        } else {
            // Tro ve login -> su dung return back
            flash()->addError('Đăng nhập thất bại!');
            return redirect()->back();
        }
    }

    // POST: /admin/logout
    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }

}
