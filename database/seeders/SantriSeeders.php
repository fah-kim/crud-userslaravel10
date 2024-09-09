<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Santri extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('santris')->insert([
            'nama' => 'Fahris Hakim',
            'usia' => '18',
            'asal' => 'Lubuklinggau'
        ]);
    }
}
