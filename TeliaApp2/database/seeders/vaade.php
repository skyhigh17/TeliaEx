<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vaade extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaade')->insert([
            'name' => 'Vaade1',
            'url' => 'vaade1',

        ]);
        DB::table('vaade')->insert([
            'name' => 'Vaade2',
            'url' => 'vaade2',
        ]);
        DB::table('vaade')->insert([
            'name' => 'Vaade3',
            'url' => 'vaade3',
            'kuupaev' => '2022-01-19',
        ]);
    }
}
