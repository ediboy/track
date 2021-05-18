<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Profile;
use ProfileTransformer;
use UserProfileTransformer;
use UserTransformer;
use Image;
use Storage;
use Carbon\Carbon;
use Validator;
use Cache;
use UserService;

class UserController extends Controller
{
    protected $userTransformer;
    protected $userService;

    /**
     * Construct the controller
     *
     * @param App\Transformers\UserTransformer $userTransformer
     * @return void
     */
    public function __construct(UserTransformer $userTransformer, UserService $userService)
    {
        $this->userTransformer = $userTransformer;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->allUsers();

        return response()->json((new UserTransformer)->transformCollection($users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = Profile::all();

        $fields = (new ProfileTransformer)->transformCollection($fields);

        $fields = $fields->groupBy('group');

        return response()->json($fields);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cache::forget('users');

        $images = Profile::where('type', 'image')->select('name')->get();

        $images = $images->pluck('name');

        $this->validate(request(), [
            'Firstname'             => 'required',
            'Lastname'              => 'required',
            'Civil Status'          => 'required',
            'Birthday'              => 'required',
            'Email'                 => 'required|email',
            'Employee Number'       => 'required',
            'Position'              => 'required',
            'Start Date'            => 'required',
            'Hourly Rate'           => 'required',
            'Status'                => 'required'
        ]);

        $user = User::create([
            'firstname' => request('Firstname'),
            'lastname'  => request('Lastname'),
            'email'     => request('Email'),
            'password'  => \Hash::make(env('USER_DEFAULT_PASSWORD'))
        ]);

        foreach (request()->all() as $detailName => $detailValue) {
            if ($detailValue) {
                $detail = Profile::where('name', '=', $detailName)->first();

                if ($detail) {
                    if ($detail->type == 'image') {
                        $image = Image::make(request($detail->name));

                        $detailValue = md5(microtime()) . '.png';

                        $image->fit(500, 500, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                        Storage::put('public/profiles/'. $detailValue, (string) $image->encode());
                    }

                    $user->profiles()->attach($detail->id, ['value' => $detailValue]);
                }
            }
        }

        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json((new UserProfileTransformer)->transform($user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $fields = Profile::with(['users' => function ($q) use ($user) {
            $q->select('firstname')->where('users.id', $user->id);
        }])->get();

        $fields = (new ProfileTransformer)->transformCollection($fields);

        $fields = $fields->groupBy('group');

        return response()->json($fields);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Cache::forget('users');

        $images = Profile::where('type', 'image')->select('name')->get();

        $images = $images->pluck('name');

        $this->validate(request(), [
            'Firstname'             => 'required',
            'Lastname'              => 'required',
            'Civil Status'          => 'required',
            'Birthday'              => 'required',
            'Email'                 => 'required|email',
            'Employee Number'       => 'required',
            'Position'              => 'required',
            'Start Date'            => 'required',
            'Hourly Rate'           => 'required',
            'Status'                => 'required'
        ]);

        $user->update([
            'firstname' => request('Firstname'),
            'lastname'  => request('Lastname'),
            'email'     => request('Email')
        ]);

        foreach (request()->all() as $detailName => $detailValue) {
            if ($detailValue) {
                $detail = Profile::where('name', '=', $detailName)->first();

                if ($detail) {
                    if ($detail->type == 'image') {
                        if (str_contains(request($detail->name), 'base64') == 1) {
                            $image = Image::make(request($detail->name));

                            $detailValue = md5(microtime()) . '.png';

                            $image->fit(500, 500, function ($constraint) {
                                $constraint->aspectRatio();
                            });

                            Storage::put('public/profiles/'. $detailValue, (string) $image->encode());
                        } else {
                            $detailValue = explode("/storage/profiles/", request($detail->name));
                            $detailValue = $detailValue[1];
                        }
                    }

                    if ($user->profiles->contains($detail->id)) {
                        $user->profiles()->updateExistingPivot($detail->id, ['value' => $detailValue]);
                    } else {
                        $user->profiles()->attach($detail->id, ['value' => $detailValue]);
                    }
                }
            }
        }

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Cache::forget('users');
        Cache::forget('teams');

        $user->delete();

        return response()->json();
    }
}
