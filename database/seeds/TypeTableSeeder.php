<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tb_type')->insert([
        'type' => 'Mudah Pecah',
        'charge' => '20000'
        ]);
        DB::table('tb_type')->insert([
            'type' => 'Medium',
            'charge' => '15000'
        ]);
        DB::table('tb_type')->insert([
            'type' => 'Keras',
            'charge' => '10000'
        ]);
    }
}
