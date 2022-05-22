<?php

namespace App\Repositories;

class UserRepository
{
    public function getUser(int $userId): array
    {
        return [
            'id'    => 123,
            'name' => 'Juliano Basso'
        ];
    }
}
