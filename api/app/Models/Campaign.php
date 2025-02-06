<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'id_user',
        'name',
        'budget',
        'description',
        'start_date',
        'end_date'
    ];
}
