<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['login','store']
        ]);
    }


    public function login()
    {
        return view('Session.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ],
            [
                'name.required' => '账号不能为空',
                'password.required' => '密码不能为空'
            ]);
        //验证 账号密码是否正确
        //dd(DB::table('users')->where('name', $request->name)->value('name'));
            if((DB::table('users')->where('name', '=',$request->name)->value('name'))){
                if (DB::table('users')->where('name', $request->name)->value('status') == 1) {
                    if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
                        //认证通过 登录成功 提示登录成功 跳转到上一次访问的页面
                        return redirect()->intended(route('shop.index'))->with('success', '登录成功');
                       //return "登陆成功";
                    } else {
                        //登录失败
                        return back()->with('danger', '用户名或密码错误，请重新登录')->withInput();
                    }
                } else {
                    return "等待审核";
                }
            }else{
                return "清先注册";
            }


    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success','您已成功退出登录');
    }
}
