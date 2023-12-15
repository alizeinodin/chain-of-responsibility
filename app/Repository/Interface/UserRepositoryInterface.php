<?php

namespace App\Repository\Interface;

use App\Models\User;

interface UserRepositoryInterface
{
    public function decreaseCredit(User $user, int $amount): bool;
}
