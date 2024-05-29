<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

/**
 * Author Name  :  WeblineIndia  |  https://www.weblineindia.com/
 *
 * For more such software development components and code libraries, visit us at
 * https://www.weblineindia.com/communities.html
 *
 * Our Github URL : https://github.com/weblineindia
 **/
class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
