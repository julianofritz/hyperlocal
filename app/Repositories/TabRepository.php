<?php

namespace App\Repositories;

class TabRepository
{
    public function getTab(int $tabId): array
    {
        return [
            'id'            => 123,
            'client_name'   => 'Juliano Basso',
            'value'         => 320,
            'partner_id'    => 'abc123abc',
        ];
    }
}
