<?php

namespace Database\Seeders;

use App\Models\EndUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name' => config('users.super-admin.name'),
            'email' => config('users.super-admin.email'),
            'password' => Hash::make(config('users.super-admin.password'))
        ]);
        $super_admin->assignRole(User::SUPER_ADMIN_ROLE);

        $admin = User::create([
            'name' => config('users.admin.name'),
            'email' => config('users.admin.email'),
            'password' => Hash::make(config('users.admin.password'))
        ]);
        $admin->assignRole(User::ADMIN_ROLE);

        if(config('app.env') != 'production') {
            User::factory()->count(10)->for(
                EndUser::factory(), 'userable'
            )->create()->each(function ($user) {
                $user->assignRole(User::END_USER_ROLE);
            });
        }
    }
}
