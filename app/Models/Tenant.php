<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class Tenant extends \Spatie\Multitenancy\Models\Tenant
{
    protected $fillable = [
        'name',
        'domain',
        'database',
    ];

    protected static function booted(): void
    {
        static::creating(function(Tenant $tenant) {
            $query = "CREATE DATABASE IF NOT EXISTS $tenant->database;";
            DB::statement($query);
        });

        static::created(function(Tenant $tenant) {
            Artisan::call('tenants:artisan "migrate --database=tenant"');
        });
    }
}
