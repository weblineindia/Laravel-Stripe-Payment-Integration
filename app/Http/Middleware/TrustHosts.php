<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

/**
 * Author Name  :  WeblineIndia  |  https://www.weblineindia.com/
 *
 * For more such software development components and code libraries, visit us at
 * https://www.weblineindia.com/communities.html
 *
 * Our Github URL : https://github.com/weblineindia
 **/
class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array<int, string|null>
     */
    public function hosts(): array
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
