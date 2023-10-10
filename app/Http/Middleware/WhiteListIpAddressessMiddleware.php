<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WhiteListIpAddressessMiddleware
{
    public $whitelistIps = [
        '127.0.0.1',
        '54.86.50.139',
        '104.28.251.152'
    ];

    
    public $cloudflareIps = [
    '104.21.15.123/22',
    '172.67.162.154/22'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->getClientIp(), $this->whitelistIps) || $this->ip_in_range($request->getClientIp())) {
            return $next($request);
        }

        abort(403, "You are restricted to access the site.");


    }

    public function ip_in_range($ip){
        foreach ($this->cloudflareIps as $ipRange) {
            list($subnet, $mask) = explode('/', $ipRange);
            $subnet = ip2long($subnet);
            $ip = ip2long($ip);
            $mask = -1 << (32 - $mask);
            $subnet &= $mask;

            if (($ip & $mask) == $subnet) {
                $status = true;
                break;
            }

            $status = false;
        }

        return $status;
    }
}
