<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    protected $fillable = [
        'id_user',
        'name',
        'instagram_user',
        'followers',
        'category'
    ];
}
