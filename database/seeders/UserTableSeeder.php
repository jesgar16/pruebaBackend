<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create()->each(function($user){
            $user->roles()->attach(Role::where('id', random_int(1, 3))->first());
            $user->save();
        });

        $user = User::create([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin123@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$lUV8LksmAQN9TzpZndZ5x.RKeSE1SF0Pxuu58.ZoZ4SV0MdEEQyvq',
            'city' => 'Barranquilla',
            'department' => 'Atlántico',
            'active' => 1,
            'remember_token' => Str::random(10),
        ]);

        $user->roles()->attach(Role::find(1));

    }
}
