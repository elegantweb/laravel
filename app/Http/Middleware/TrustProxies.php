<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string
     */
    protected $proxies = [
        '127.0.0.1',
    ];

    /**
     * The headers that should be used to detect proxies.
     *
     * @var array
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;

    /**
     * Create a new trusted proxies middleware instance.
     */
    public function __construct()
    {
        $this->proxies = array_merge($this->proxies, array_filter(array_map('trim', explode(',', env('APP_TRUST_PROXIES')))));
    }
}
