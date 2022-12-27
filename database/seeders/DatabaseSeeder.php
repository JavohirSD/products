<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRoles;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(1)->create();

         $user = User::firstOrCreate([
             'name'  => 'Admin',
             'email' => 'admin@example.com',
             'role'  => UserRoles::ADMIN_ROLE,
         ],[
             'password' => 'Hash::make("admin123")'
         ]);
    }
}
