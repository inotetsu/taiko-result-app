<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['id' => 1, 'name'=>'オリジナル'],
            ['id' => 2, 'name'=>'ゲームミュージック'],
            ['id' => 3, 'name'=>'ポップス'],
            ['id' => 4, 'name'=>'クラシック'],
            ['id' => 5, 'name'=>'アニメ'],
            ['id' => 6, 'name'=>'ボーカロイド'],
            ['id' => 7, 'name'=>'バラエティ'],
        ]);
    }
}
