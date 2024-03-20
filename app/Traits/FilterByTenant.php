<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

trait FilterByTenant
{
    protected static function booted(): void
    {
        $currentTenantId = auth()->user()->current_tenant_id;

        static::creating(function (Model $model) use ($currentTenantId) {
            $model->tenant_id = $currentTenantId;
        });

        static::addGlobalScope(function (Builder $builder) use ($currentTenantId) {
            $builder->where('tenant_id', $currentTenantId);
        });
    }
}
