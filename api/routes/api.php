<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\InfluencerCampaignController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('user', [JWTAuthController::class, 'getUser']);
    Route::post('logout', [JWTAuthController::class, 'logout']);
    Route::get('test', [JWTAuthController::class, 'test']);

    Route::post('/influencer', [InfluencerController::class, 'influencer']);
    Route::get('/influencers', [InfluencerController::class, 'getInfluencers']);

    Route::post('/campaign', [CampaignController::class, 'create']);
    Route::get('/campaigns', [CampaignController::class, 'getCampaigns']);

    Route::post('/relateInfluencerCampaign', [InfluencerCampaignController::class, 'relateInfluencerCampaign']);
});
