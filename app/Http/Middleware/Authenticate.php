<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
      $domain = $request->route()->domain();
      $signInRouteName = 'admin.sign-in';

      return route($signInRouteName);
      if (!$request->expectsJson()) {

      }
    }
}
