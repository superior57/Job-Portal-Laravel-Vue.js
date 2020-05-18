<?php
/**
 * Class LoginController.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use App\User;
use Schema;
use Session;
use View;

/**
 * Class LoginController
 *
 */
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
     * @param string $request request attributes
     *
     * @return authenticated users
     */
    protected function authenticated(Request $request, $user)
    {
        if (Schema::hasTable('users')) {
            if (!empty($user->verification_code)) {
                Session::flash('error', trans('lang.verification_code_not_verified'));
                Auth::logout();
                return Redirect::to('/');
            } else {
                $user_id = Auth::user()->id;
                $user_role_type = User::getUserRoleType($user_id);
                if (empty($user_role_type)) {
                    Session::flash('error', trans('Unfortunately you have been logged out due to in-sufficient role privileges for you account, For Further details contact to administrator'));
                    Auth::logout();
                    return Redirect::to('/');
                }
                $user_role = $user_role_type->role_type;
                if ($user_role === 'freelancer') {
                    return Redirect::to('freelancer/dashboard');
                } elseif ($user_role === 'employer') {
                    return Redirect::to('employer/dashboard');
                } else {
                    return Redirect::to(url()->previous());
                }
            }
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Schema::hasTable('users')) {
            $this->middleware('guest')->except('logout');
        }
    }
}
