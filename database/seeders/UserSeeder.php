<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'rifkyalfrzl',
            'password' => Hash::make('87654321'),
        ]);
        DB::table('users')->insert([
            'username' => 'peterparkir',
            'password' => Hash::make('12345678'),
        ]);

    }
}
