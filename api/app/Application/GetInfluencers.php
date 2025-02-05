<?php

namespace App\Application;

use App\Models\Influencer;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * List all influencers
 */
class GetInfluencers
{
    /**
     * @return array
     */
    public function get(): array
    {
        $influencers = Influencer::all();

        return $influencers->toArray();
    }
}
