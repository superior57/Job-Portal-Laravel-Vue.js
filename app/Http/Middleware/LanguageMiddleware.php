<?php
/**
 * Class LanguageMiddleware
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
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Config;

/**
 * Class Language Middleware
 *
 */
class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request request
     * @param \Closure                 $next    next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->cookie('applocale', Config::get('app.locale'));
        App::setLocale($locale);
        Carbon::setLocale($locale);

        return $next($request);
    }
}
