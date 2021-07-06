<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\TwoFactorAuthentication;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Code;

class LoginController extends Controller
{
    protected $twoFactor;
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

    use ThrottlesLogins;
    //protected $maxAttempts = 2;

    /**
     * Create a new controller instance.
     *
     * @return void
     */



    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function showCodeForm()
    {
        return view('auth.two-factor.login-code');
    }

protected function attemptLogin(Request $request){
        return Auth::attempt($request->only('email','password'),$request->filled(('remember')));
}

    public function login(Request $request)
    {
        $this->validateForm($request);
      //check username and password

      if ($this->attemptLogin($request)) {

            return $this->sendSuccessResponse();
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }
        $this->incrementLoginAttempts($request);

       return $this->sendLoginFailedResponse();
    }

    protected function sendHasTwoFactorResponse()
    {
        return redirect()->route('auth.login.code.form');
    }

    protected function loginAndRedirect(){

    }
    protected function sendLoginFailedResponse()
    {
        return back()->with('wrongCredentials', true);
    }

    protected function isValidCredentials($request)
    {
        return Auth::validate($request->only(['email', 'password']));
    }


    protected function sendSuccessResponse()
    {
        session()->regenerate();
        return redirect()->intended();//
    }

/*    public function confirmCode(Code $request)
    {
        $response = $this->twoFactor->login();
        return   $response === $this->twoFactor::AUTHENTICATED
            ? $this->sendSuccessResponse()
            : back()->with('invalidCode', true);
    }*/


    protected function validateForm(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:users'],
                'password' =>  ['required'],
                // 'g-recaptcha-response' => ['required', new Recaptcha]
            ],
            [
                'g-recaptcha-response.required' => __('auth.recaptcha')
            ]
        );
    }

    protected function getUser($request)
    {
        return User::where('email', $request->email)->firstOrFail();
    }




    public function logout()
    {
        session()->invalidate();

        Auth::logout();

        return redirect()->route('home');
    }


    protected function username()
    {
        return 'email';
    }
}
