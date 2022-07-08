<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Appliance',
            ],
            [
                'category_name' => 'Gadget',
            ],
            [
                'category_name' => 'Misc',
            ],
            [
                'category_name' => 'Mobile Phone',
            ]
        ]);
    }
}
