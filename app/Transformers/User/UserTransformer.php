<?php

namespace App\Transformers\User;

use App\Transformers\Transformer;
use Illuminate\Support\Facades\Storage;

class UserTransformer extends Transformer
{
    /**
     * Transform user profile
     *
     * @param  Collection  $item
     * @return array
     */
    public function transform($item)
    {
        $employeeNumber = $item->profiles->where('name', 'Employee Number')->first()->pivot->value ?? null;
        $profilePicture = $item->profiles->where('name', 'Profile Picture')->first()->pivot->value ?? 'default.png';
        $profilePicture = Storage::url('public/profiles/' .  $profilePicture);

        return [
            'id'                => $item->id,
            'name'              => $item->reverseFullname,
            'employee_number'   => $employeeNumber,
            'profile_picture'   => $profilePicture,
        ];
    }
}
