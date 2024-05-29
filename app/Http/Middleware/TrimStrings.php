<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

/**
 * Author Name  :  WeblineIndia  |  https://www.weblineindia.com/
 *
 * For more such software development components and code libraries, visit us at
 * https://www.weblineindia.com/communities.html
 *
 * Our Github URL : https://github.com/weblineindia
 **/
class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array<int, string>
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
