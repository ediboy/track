<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Team;
use User;
use TeamTransformer;
use UserTransformer;
use Cache;
use UserService;
use TeamService;

class TeamController extends Controller
{
    protected $teamTransformer;
    protected $userTransformer;
    protected $userService;
    protected $teamService;

    /**
     * Construct the controller
     *
     * @param App\Transformers\Team\TeamTransformer $teamTransformer
     * @param App\Transformers\User\UserTransformer $userTransformer
     * @param App\Services\UserService $userTransformer
     * @param App\Services\TeamService $teamTransformer
     * @return void
     */
    public function __construct(TeamTransformer $teamTransformer, UserTransformer $userTransformer, UserService $userService, TeamService $teamService)
    {
        $this->teamTransformer = $teamTransformer;
        $this->userTransformer = $userTransformer;
        $this->userService = $userService;
        $this->teamService = $teamService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->teamService->allTeams();

        return response()->json($this->teamTransformer->transformCollection($teams));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userService->allUsers();

        return response()->json($this->userTransformer->transformCollection($users));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cache::forget('teams');

        $this->validate(request(), [
            'title'         => 'required',
            'description'   => 'required'
        ]);

        $team = Team::create($request->all());

        $team->users()->sync(request('users'));

        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $users = $this->userService->allUsers()->whereNotIn('id', $team->users->pluck('id'))->values()->all();

        return response()->json([
            'team'          => $this->teamTransformer->transform($team),
            'users'         => $this->userTransformer->transformCollection($users),
            'assignedUsers' => $this->userTransformer->transformCollection($team->users)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        Cache::forget('teams');

        $this->validate(request(), [
            'title'         => 'required',
            'description'   => 'required'
        ]);

        $team->update($request->all());

        $team->users()->sync(request('users'));

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        Cache::forget('teams');

        $team->delete();

        return response()->json();
    }
}
