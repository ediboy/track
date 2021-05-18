<?php

namespace App\Services;

use Team;
use Illuminate\Support\Facades\Cache;

class TeamService
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function allTeams()
    {
        if ($teams = Cache::get('teams')) {
            return $teams;
        }

        $teams = new Team;

        // Sort
        $sortBy = request('sortBy', 'title');
        $sort = request('sort', 'ASC');

        $teams = $teams->withCount('users')->orderBy($sortBy, $sort)->get();

        Cache::forever('teams', $teams);

        return $teams;
    }
}
