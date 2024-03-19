<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

trait FilterByUser
{
    protected static function booted(): void
    {
        static::creating(function (Model $model) {
            $model->user_id = auth()->id();
        });

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }
}
