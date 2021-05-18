<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create User
        $user = User::create([
            "firstname" => env('SUPER_FIRSTNAME'),
            "lastname" => env('SUPER_LASTNAME'),
            "email" => env('SUPER_EMAIL'),
            "password" => Hash::make(env('SUPER_PASSWORD')),
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);

        // Assign role to user
        $user->assignRole('super-admin');
    }
}
