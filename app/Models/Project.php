<?php

namespace App\Models;

use App\Traits\FilterByUser;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use FilterByUser;

    protected $fillable = [
        'name',
        'user_id',
    ];
}
