<?php

namespace App\Models;

use App\Traits\FilterByUser;
use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use FilterByTenant;

    protected $fillable = [
        'name',
        'user_id',
    ];
}
