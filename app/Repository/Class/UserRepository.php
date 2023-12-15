<?php

namespace App\Repository\Class;

use App\Models\User;
use App\Repository\Interface\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function decreaseCredit(User $user, int $amount): bool
    {
        if ($user->credit >= $amount)
            $user->credit -= $amount;
        return $user->save();
    }
}
