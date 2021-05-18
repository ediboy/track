<?php

namespace App\Transformers\User;

use App\Transformers\Transformer;
use ProfileUserTransformer;
use Storage;

class UserProfileTransformer extends Transformer
{
    protected $profileUserTransformer;

    /**
     * Transform user profile
     *
     * @param  Collection  $item
     * @return array
     */
    public function transform($item)
    {
        $position       = $item->profiles->where('name', 'Position')->first()->pivot->value ?? null;
        $profilePicture = $item->profiles->where('name', 'Profile Picture')->first()->pivot->value ?? 'default.png';
        $profilePicture = Storage::url('public/profiles/' .  $profilePicture);
        $profiles       = $this->processProfiles($item->profiles);

        $this->profileUserTransformer = new ProfileUserTransformer;

        return [
            'id'                => $item->id,
            'name'              => $item->fullname,
            'position'          => $position,
            'profile_picture'   => $profilePicture,
            'profile_picture'   => $profilePicture,
            'personal'          => isset($profiles['personal']) ? $this->profileUserTransformer->transformCollection($profiles['personal']) : null,
            'work'              => isset($profiles['work']) ? $this->profileUserTransformer->transformCollection($profiles['work']) : null,
            'other'             => isset($profiles['other']) ? $this->profileUserTransformer->transformCollection($profiles['other']) : null,
        ];
    }

    public function processProfiles($profiles)
    {
        // Remove profile picture
        $profiles = $profiles->filter(function ($item) {
            // Convert date to string
            if ($item->type == 'date' && $item->pivot->value) {
                return $item->pivot->value = date('F d, Y', strtotime($item->pivot->value));
                ;
            }

            // Exclude profile picture
            if ($item->name != 'Profile Picture') {
                return true;
            }
        });

        return $profiles->groupBy('group');
    }
}
