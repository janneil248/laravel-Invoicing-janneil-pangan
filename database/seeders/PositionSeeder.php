<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
                'position_name' => 'Manager',
            ],
            [
                'position_name' => 'Supervisor',
            ],
            [
                'position_name' => 'Sales Agent',
            ]
        ]);
    }
}
