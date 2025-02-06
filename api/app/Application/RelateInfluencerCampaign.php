<?php

namespace App\Application;

use App\Models\Campaign;
use App\Models\Influencer;
use App\Models\InfluencerCampaign;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Make the relationship between an influencer and a campaign
 */
class RelateInfluencerCampaign
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
     * @return Influencer
     */
    public function relate(): InfluencerCampaign
    {
        try {
            $this->validate();
        } catch (Exception $e) {
            throw new HttpException(400, $e->getMessage());
        }

        try {
            $influencerCampaign = new InfluencerCampaign;
            $influencerCampaign->id_influencer = $this->input['influencer'];
            $influencerCampaign->id_campaign = $this->input['campaign'];

            $influencerCampaign->save();
        } catch (Exception $e) {
            throw new HttpException(500, 'Erro ao vincular um influencer e uma campanha: ' . $e->getMessage());
        }

        return $influencerCampaign;
    }

    /**
     * @param array $input
     * @throws \Exception
     * @return void
     */
    protected function validate(): void
    {
        $influencer = Influencer::find($this->input['influencer']);
        if (empty($influencer)) {
            throw new Exception('Influencer não encontrado');
        }

        $campaign = Campaign::find($this->input['campaign']);
        if (empty($campaign)) {
            throw new Exception('Campanha não encontrada');
        }
    }
}
