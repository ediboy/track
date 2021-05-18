<?php

namespace App\Services;

use User;
use Illuminate\Support\Facades\Cache;

class UserService
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function allUsers()
    {
        if ($users = Cache::get('users')) {
            return $users;
        }

        $users = new User;

        // Sort
        $sortBy = request('sortBy', 'lastname');
        $sort = request('sort', 'ASC');

        $users = $users->orderBy($sortBy, $sort)->get();

        Cache::forever('users', $users);

        return $users;
    }
}
