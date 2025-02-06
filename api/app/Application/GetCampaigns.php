<?php

namespace App\Application;

use App\Models\Campaign;

/**
 * List all campaigns
 */
class GetCampaigns
{
    /**
     * @return array
     */
    public function get(): array
    {
        $influencers = Campaign::all();

        return $influencers->toArray();
    }
}
