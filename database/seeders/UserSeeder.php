<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $users =[[
            'name' => Str::random(10),
            'phone' => '1111111111111',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'address'=>'135, Pilkington Avenue',
            'latitude'=>'52.5487921',
            'longitude'=>'-1.8164308339635031'
        ],
      [
            'name' => Str::random(10),
            'phone' => '2222222222',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'address'=>'204 Kesar Orchid',
            'latitude'=>'-40.98585',
            'longitude'=>'174.50659'
        ]];

        
        DB::table('users')->insert($users);

    }
}
