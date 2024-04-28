<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    protected function attemptLogin(Request $request)
    {
        // Récupère l'utilisateur par l'email.
        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user) {
            // Récupère le password record associé à l'utilisateur.
            $passwordRecord = $user->passwordRecord;

            // Vérifie si le password record existe et si le mot de passe correspond.
            if ($passwordRecord && Hash::check($request->password, $passwordRecord->password)) {
                // Connecte l'utilisateur manuellement.
                Auth::login($user, $request->filled('remember'));

                return redirect()->intended('/home');

            }

        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',

        ]);

        
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
