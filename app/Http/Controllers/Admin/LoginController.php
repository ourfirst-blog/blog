<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->session()->has('user')) {
            return redirect()->route('Admin::index');
        }

        $loginAlert = $request->session()->get('loginAlert');

        return view('admin/login/login', [
            'alertInfo' => $loginAlert
        ]);
    }

    public function doLogin(Request $request)
    {
        $remeber = $request->rememberMe ? true : false;
        $email = $request->email;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $request->session()->flash('loginAlert', 'Email格式不正确');
            return redirect()->route('Admin::login');
        }

        $adminInfo = Users::where('email', $email)->first();
        if (empty($adminInfo)) {
            $request->session()->flash('loginAlert', '用户不存在');
            return redirect()->route('Admin::login');
        }

        $password = $request->password;

        if (password_verify($password, $adminInfo->password)) {
           $request->session()->put('user', $adminInfo);
           return redirect()->route('Admin::index');
        } else {
            $request->session()->flash('loginAlert', '密码错误');
            return redirect()->route('Admin::login');
        }
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('Admin::login');
    }
}
