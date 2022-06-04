<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'type' => rand(0, 1) ? 'agent' : 'tech',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('customers')->insert([
            'first_name' => Str::random(10),
            'surname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone' => rand(910000000, 999999999),
        ]);
    }
}
