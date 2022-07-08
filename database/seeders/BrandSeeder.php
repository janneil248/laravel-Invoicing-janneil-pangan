<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'brand_name' => 'No Brand',
            ],
            [
                'brand_name' => 'Standard',
            ],
            [
                'brand_name' => 'Apple',
            ],
            [
                'brand_name' => 'ASUS',
            ],
            [
                'brand_name' => 'Belkin',
            ],
            [
                'brand_name' => 'Daikin',
            ],
            [
                'brand_name' => 'Dyson',
            ],
            [
                'brand_name' => 'LG',
            ],
            [
                'brand_name' => 'Samsung',
            ],
            [
                'brand_name' => 'Sony',
            ]
        ]);
    }
}
