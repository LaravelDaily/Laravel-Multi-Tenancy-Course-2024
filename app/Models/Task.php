<?php

namespace App\Models;

use App\Traits\FilterByUser;
use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use FilterByTenant;

    protected $fillable = [
        'name',
        'project_id',
    ];

    /* ALTERNATIVE APPROACH
    protected static function booted(): void
    {
        static::addGlobalScope(function (Builder $builder) {
            $builder->whereRelation('project','user_id', auth()->id());
        });
    }
    */

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
