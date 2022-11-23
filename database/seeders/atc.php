<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class atc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($vid)
    {
        DB::table('atc')->insert([
            'vid' => $vid,
            'callsign' => 'test',
            'position' => 'test',
            'frequency' => 'test',
        ]);
    }
}
