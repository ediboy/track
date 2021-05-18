<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Project;
use User;
use Team;
use ProjectTransformer;
use UserTransformer;
use TeamTransformer;
use Cache;
use UserService;
use TeamService;

class ProjectController extends Controller
{
    protected $projectTransformer;
    protected $userTransformer;
    protected $teamTransformer;
    protected $userService;

    /**
     * Construct the controller
     * @param App\Transformers\Project\ProjectTransformer $projectTransformer
     * @param App\Transformers\User\UserTransformer $userTransformer
     * @param App\Transformers\Team\TeamTransformer $teamTransformer
     * @param App\Services\UserService $userTransformer
     * @param App\Services\TeamService $teamTransformer
     * @return void
     */
    public function __construct(ProjectTransformer $projectTransformer, UserTransformer $userTransformer, TeamTransformer $teamTransformer, UserService $userService, TeamService $teamService)
    {
        $this->projectTransformer = $projectTransformer;
        $this->userTransformer = $userTransformer;
        $this->teamTransformer = $teamTransformer;
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
        if ($projects = Cache::get('projects')) {
            return $projects;
        }

        $projects = new Project;

        // Sort
        $sortBy = request('sortBy', 'title');
        $sort = request('sort', 'DESC');

        $projects = $projects->orderBy($sortBy, $sort)->get();

        $projects =  response()->json($this->projectTransformer->transformCollection($projects->all()));

        Cache::forever('projects', $projects);

        return $projects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userService->allUsers();

        $teams = $this->teamService->allTeams();

        return response()->json([
            'users' => $this->userTransformer->transformCollection($users),
            'teams' => $this->teamTransformer->transformCollection($teams)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cache::forget('projects');

        $this->validate(request(), [
            'title'         => 'required',
            'description'   => 'required'
        ]);

        $project = Project::create($request->all());

        $project->users()->sync(request('users'));

        $project->teams()->sync(request('teams'));

        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $users = $this->userService->allUsers()->whereNotIn('id', $project->users->pluck('id'))->values()->all();
        $teams = $this->teamService->allTeams()->whereNotIn('id', $project->teams->pluck('id'))->values()->all();

        return response()->json([
            'project'       => $this->projectTransformer->transform($project),
            'users'         => $this->userTransformer->transformCollection($users),
            'assignedUsers' => $this->userTransformer->transformCollection($project->users),
            'teams'         => $this->teamTransformer->transformCollection($teams),
            'assignedTeams' => $this->teamTransformer->transformCollection($project->teams)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        Cache::forget('projects');

        $this->validate(request(), [
            'title'         => 'required',
            'description'   => 'required'
        ]);

        $project->update($request->all());

        $project->users()->sync(request('users'));

        $project->teams()->sync(request('teams'));

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Cache::forget('projects');

        $project->delete();

        return response()->json();
    }
}
