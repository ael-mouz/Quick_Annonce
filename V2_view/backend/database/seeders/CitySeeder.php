<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'name' => 'Casablanca',
                'zip_code' => 20000,
            ],
            [
                'name' => 'Rabat',
                'zip_code' => 10000,
            ],
            [
                'name' => 'Marrakech',
                'zip_code' => 40000,
            ],
            [
                'name' => 'Fes',
                'zip_code' => 30000,
            ],
            [
                'name' => 'Tangier',
                'zip_code' => 90000,
            ],
            [
                'name' => 'Agadir',
                'zip_code' => 80000,
            ],
            [
                'name' => 'Meknes',
                'zip_code' => 50000,
            ],
            [
                'name' => 'Oujda',
                'zip_code' => 60000,
            ],
            [
                'name' => 'Kenitra',
                'zip_code' => 14000,
            ],
            [
                'name' => 'Tetouan',
                'zip_code' => 93000,
            ],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
