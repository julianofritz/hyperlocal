<?php

namespace App\Http\Services;

use App\Repositories\TabRepository;

class Tab
{
    /** @var TabRepository */
    private $repository;

    public function __construct(TabRepository $tabRepository)
    {
        $this->repository = $tabRepository;
    }

    public function getTab(int $tabId): array
    {
        return $this->repository->getTab($tabId);
    }
}
