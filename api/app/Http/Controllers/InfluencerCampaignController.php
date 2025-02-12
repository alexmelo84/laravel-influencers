<?php

namespace App\Http\Controllers;

use App\Application\RelateInfluencerCampaign;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfluencerCampaignController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function relateInfluencerCampaign(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'influencer' => ['required', 'numeric', 'exists:influencers,id'],
            'campaign' => ['required', 'numeric', 'exists:campaigns,id']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $influencerCampaign = new RelateInfluencerCampaign($request->all());

        return response()->json($influencerCampaign->relate());
    }
}
