<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;;//デフォルト設定
    use AuthenticatesUsers {
        // logout というメソッドを、doLogoutというメソッド名に変更して継承する
        logout as doLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;//デフォルト設定
    //protected $redirectTo = '/mlog';//ログイン後のリダイレクト先

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     
    public function logout(Request $request){
        // 1. 元々のログアウト処理を実行する
        $this->doLogout($request);
        // 2. リダイレクト先を独自に設定する。
        return redirect('/top'); 
    }
}
