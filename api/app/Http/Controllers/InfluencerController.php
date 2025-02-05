<?php

namespace App\Http\Controllers;

use App\Application\CreateInfluencer;
use App\Application\GetInfluencers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfluencerController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function influencer(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id_user' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'instagram' => ['required', 'string'],
            'followers' => ['required', 'integer'],
            'category' => ['required', 'string']
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = new CreateInfluencer($request->all());

        return response()->json($user->create());
    }

    /**
     * @return JsonResponse
     * @return JsonResponse
     */
    public function getInfluencers(): JsonResponse
    {
        $influencers = new GetInfluencers();

        return response()->json($influencers->get());
    }
}
