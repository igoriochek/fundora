<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PagePolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if ($user->id === auth()->user()->id) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function update(User $user, Page $page): bool
    {
        return true;
    }
}
