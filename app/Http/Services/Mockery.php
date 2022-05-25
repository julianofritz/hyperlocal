<?php

namespace App\Http\Services;

use App\Repositories\TabRepository;

class Mockery
{
    /** @var TabRepository */
    private $tabRepository;

    public function __construct(TabRepository $tabRepository)
    {
        $this->tabRepository = $tabRepository;
    }

    public function getTabFeesOnPartner(int $tabId): array
    {
        $tab = $this->tabRepository->getTab($tabId);

        return $this->tabFeesOnPartner($tab['partner_id']);
    }

    public function tabFeesOnPartner(string $tabPartnerId): array
    {
        // Aqui deveria chamar uma API de terceiro que retornaria as taxas
        return [
            'mastercard' => 2,
            'visa' => 1,
        ];
    }

}
