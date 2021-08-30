<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'email' => 'admin@test.com',
                'firstname' => 'admin',
                'lastname' => '',
                'profile_photo' => 'default.png',
                'password' => 'admin'
            ]
        );
    }
}
