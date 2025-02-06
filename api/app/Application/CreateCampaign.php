<?php

namespace App\Application;

use App\Models\Campaign;
use Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Create a campaign
 */
class CreateCampaign
{
    /**
     * @var array $input
     */
    private array $input;

    /**
     * @var array $input
     */
    public function __construct(array $input)
    {
        $this->input = $input;
    }

    /**
     * @return Campaign
     */
    public function create(): Campaign
    {
        try {
            $campaign = new Campaign;
            $campaign->id_user = Auth::id();
            $campaign->name = $this->input['name'];
            $campaign->budget = $this->input['budget'];
            $campaign->description = $this->input['description'] ?? null;
            $campaign->start_date = $this->input['start_date'];
            $campaign->end_date = $this->input['end_date'];

            $campaign->save();
        } catch (Exception $e) {
            throw new HttpException(500, 'Erro ao criar a campanha: ' . $e->getMessage());
        }

        return $campaign;
    }
}
