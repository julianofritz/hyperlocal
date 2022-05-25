<?php

namespace App\Http\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Login
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $userId
     * @return array<mixed>
     */
    public function getUser(int $userId): array
    {
        try {
            $user = $this->userRepository->getUser($userId);

            $user['isLogged'] = true;

            return $user;
        } catch (ModelNotFoundException $e) {
            return [
                'isLogged' => false
            ];
        }
    }
}
