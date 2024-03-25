<?php

namespace App\Models;

class Tenant extends \Spatie\Multitenancy\Models\Tenant
{
    protected $fillable = [
        'name',
        'domain',
        'database',
    ];
}
