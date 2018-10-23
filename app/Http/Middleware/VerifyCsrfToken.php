<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/get_customer_by_collector_id',
        '/update_customer_by_collector_id',
        '/login_account',
        '/get_all_customer_by_collector_id'
    ];
}
