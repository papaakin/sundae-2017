<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Carbon\Carbon;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;

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
    protected $redirectTo = '/home';

    protected $username = 'username';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username() {
        return 'username';
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request) {
        $this->clearLoginAttempts($request);
        // Create jwt token ...
        $token = JWTAuth::attempt($request->only('username', 'password'), [
            'exp' => Carbon::now()->addYear(10)->timestamp,
        ]);

        return response()->json(['SUCCESS' => 'AUTHENTICATED', 'TOKEN' => $token], Response::HTTP_OK);
    }

    /**
     * Get the failed login response instance.
     *
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse() {
        return response()->json(['ERROR' => 'AUTH_FAILED'], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Error after determining they are locked out.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLockoutResponse(Request $request) {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        return response()->json(['ERROR' => 'TOO_MANY_ATTEMPTS', 'WAIT' => $seconds], Response::HTTP_UNAUTHORIZED);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return response()->json(['SUCCESS' => 'LOGGED OUT'], Response::HTTP_OK);
    }
}
