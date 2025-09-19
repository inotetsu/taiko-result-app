<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DifficultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('difficulties')->insert([
            ['id'=>1, 'name'=>'裏'],
            ['id'=>2, 'name'=>'おに'],
            ['id'=>3, 'name'=>'むずかしい'],
            ['id'=>4, 'name'=>'ふつう'],
            ['id'=>5, 'name'=>'かんたん'],
        ]);
    }
}
