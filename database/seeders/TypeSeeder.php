<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Editor',
            'slug' => 'editor',
            'description' => 'Editor',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
