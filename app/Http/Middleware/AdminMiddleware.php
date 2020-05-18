<?php
/**
 * Class AdminMiddleware.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

/**
 * Class AdminMiddleware
 *
 */
class AdminMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request request attribute
     * @param \Closure                 $next    closure
     *
     * @package Worketic
     *
     * @access public
     *
     * @version 1.0
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd(Auth::check());
        $users = User::all()->count();
        if (!($users == 1)) {
            //Skills
            if ($request->path() === 'admin/skills') {
                // if (!Auth::user()->hasPermissionTo('create_skills')) {
                //     abort(404);
                // }
            }
            if ($request->is('admin/skills/update-skills/*')) {
                if (!Auth::user()->hasPermissionTo('update_skills')) {
                     abort(404);
                }
            }
            if ($request->path() === 'admin/skills/delete-skills') {
                if (!Auth::user()->hasPermissionTo('delete_skills')) {
                     abort(404);
                }
            }
            //Departments
            if ($request->path() === 'admin/departments') {
                if (!Auth::user()->hasPermissionTo('create_departments')) {
                     abort(404);
                }
            }
            if ($request->is('admin/skills/update-dpts/*')) {
                if (!Auth::user()->hasPermissionTo('update_departments')) {
                     abort(404);
                }
            }
            if ($request->path() === 'admin/skills/delete-dpts') {
                if (!Auth::user()->hasPermissionTo('delete_departments')) {
                     abort(404);
                }
            }
            //Languages
            if ($request->path() === 'admin/languages') {
                if (!Auth::user()->hasPermissionTo('create_language')) {
                     abort(404);
                }
            }
            if ($request->is('admin/skills/update-langs/*')) {
                if (!Auth::user()->hasPermissionTo('update_language')) {
                     abort(404);
                }
            }
            if ($request->path() === 'admin/skills/delete-langs') {
                if (!Auth::user()->hasPermissionTo('delete_language')) {
                     abort(404);
                }
            }
            //Categories
            if ($request->path() === 'admin/categories') {
                if (!Auth::user()->hasPermissionTo('create_category')) {
                     abort(404);
                }
            }
            if ($request->is('admin/skills/update-cats/*')) {
                if (!Auth::user()->hasPermissionTo('update_category')) {
                     abort(404);
                }
            }
            if ($request->path() === 'admin/skills/delete-cats') {
                if (!Auth::user()->hasPermissionTo('delete_category')) {
                     abort(404);
                }
            }
            //Locations
            if ($request->path() === 'admin/locations') {
                if (!Auth::user()->hasPermissionTo('create_location')) {
                     abort(404);
                }
            }
            if ($request->is('admin/skills/update-locations/*')) {
                if (!Auth::user()->hasPermissionTo('update_location')) {
                     abort(404);
                }
            }
            if ($request->path() === 'admin/skills/delete-locations') {
                if (!Auth::user()->hasPermissionTo('delete_location')) {
                     abort(404);
                }
            }
        }
        return $next($request);
    }
}
