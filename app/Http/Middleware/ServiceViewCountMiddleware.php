<?php

namespace App\Http\Middleware;

use Closure;

class ServiceViewCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!isset($_COOKIE[$key . $post_id])) {
            setcookie($key . $post_id, $key, time() + 3600);
            $view_key = $key;

            $count = get_post_meta($post_id, $view_key, true);

            if ($count == '') {
                $count = 0;
                delete_post_meta($post_id, $view_key);
                add_post_meta($post_id, $view_key, '0');
            } else {
                $count++;
                update_post_meta($post_id, $view_key, $count);
            }
        }
        return $next($request);
    }
}
