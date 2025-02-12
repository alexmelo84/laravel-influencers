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

    public function influencers()
    {
        return $this->belongsToMany(Influencer::class, 'influencer_campaigns', 'id_campaign', 'id_influencer');
    }
}
