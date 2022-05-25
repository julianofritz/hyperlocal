<?php

namespace App\Http\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class StaticClass
{
    public static function getUserFullName(User $user): string
    {
        return $user->name . ' ' . $user->lastName;
    }

    public static function getUserDocumentById(UserRepository $userRepository, int $userId): int
    {
        $user = $userRepository->getUser($userId);

        return $user['document'];
    }
}
