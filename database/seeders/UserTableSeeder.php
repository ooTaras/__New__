<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['name' => 'Taras',
            'email' => "Taras@gmail",
            'password' => Hash::make(Str::random(16))
        ],
        [
            'name' => 'Автор невідомий',
            'email' => "....",
            'password' => 1 
        ]
        ];
        DB::table('users')->insert($data);
    }
}
