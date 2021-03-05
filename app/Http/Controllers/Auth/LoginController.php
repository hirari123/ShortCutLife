<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * ログイン後の処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @override \Illuminate\Http\Foundation\Auth\AuthenticatesUsers
     */

    // ログイン後にフラッシュメッセージ
    protected function authenticated(Request $request)
    {
        // フラッシュメッセージを表示
        session()->flash('msg_success', 'ログインしました!!');
        return redirect('/');
    }


    // ゲストログイン処理
    public function guestLogin()
    {
        if (Auth::loginUsingId(config('user.guest_user_id'))) {
            session()->flash('msg_success', 'ゲストユーザーでログインしました!!');
            return redirect('/');
        }

        session()->flash('msg_error', 'ゲストログインに失敗しました!!');
        return redirect('/');
    }

    // ログアウト後にフラッシュメッセージ
    protected function loggedOut(Request $request)
    {
        $this->guard()->logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();

        // フラッシュメッセージを表示
        session()->flash('msg_success', 'ログアウトしました!!');
        return redirect('/');
    }

}
