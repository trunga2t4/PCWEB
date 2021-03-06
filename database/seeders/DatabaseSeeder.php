<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Insert admin info
        DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'type' => 'admin',
                'email' => 'admin@blog.com',
                'password' => Hash::make('password'),
            )
        );
        DB::table('profiles')->insert(
            array(
                'user_id' => 1,
                'description' => 'This is the Admin account',
            )
        );
    }
}
