<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Stancl\Tenancy\Database\Concerns\BelongsToPrimaryModel;

class Task extends Model
{
    use BelongsToPrimaryModel;

    protected $fillable = [
        'name',
        'project_id',
    ];

    public function getRelationshipToPrimaryModel(): string
    {
        return 'project';
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
