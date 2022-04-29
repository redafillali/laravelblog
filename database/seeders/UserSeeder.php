<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Reda El Fillali',
            'email' => 'reda.elfillali@gmail.com',
            'username' => 'redafillali',
            'password' => Hash::make('123456'),
            'type_id' => 1,
            'blocked' => 0
        ]);
        User::factory()
        ->count(50)
        ->create();
    }
}
