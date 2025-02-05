<?php

namespace App\Http\Controllers;

use App\Application\CreateInfluencer;
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
}
