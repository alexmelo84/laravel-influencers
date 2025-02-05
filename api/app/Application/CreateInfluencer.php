<?php

namespace App\Application;

use App\Models\Influencer;
use App\Models\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Create an influencer
 */
class CreateInfluencer
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
    public function create(): Influencer
    {
        try {
            $this->validate();
        } catch (Exception $e) {
            throw new HttpException(400, $e->getMessage());
        }

        try {
            $influencer = new Influencer;
            $influencer->id_user = $this->input['id_user'];
            $influencer->name = $this->input['name'];
            $influencer->instagram_user = $this->input['instagram'];
            $influencer->followers = $this->input['followers'];
            $influencer->category = $this->input['category'];

            $influencer->save();
        } catch (Exception $e) {
            throw new HttpException(500, 'Erro ao criar o perfil social: ' . $e->getMessage());
        }

        return $influencer;
    }

    /**
     * @param array $input
     * @throws \Exception
     * @return void
     */
    protected function validate(): void
    {
        $user = User::find($this->input['id_user']);
        if (empty($user)) {
            throw new Exception('Uusário não encontrado');
        }

        $influencer = Influencer::where('instagram_user', $this->input['instagram'])->first();
        if (!empty($influencer)) {
            throw new Exception('Usuário de Instagram já existente');
        }
    }
}
