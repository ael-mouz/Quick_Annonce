<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\City;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id')->toArray();
        $cities = City::pluck('id')->toArray();

        $announcements = [
            [
                'username' => 'John Doe',
                'email' => 'johndoe@example.com',
                'category' => $categories[array_rand($categories)],
                'city' => $cities[array_rand($cities)],
                'title' => 'Example Announcement 1',
                'description' => 'This is an example announcement.',
                'price' => 100.00,
                'picture_1' => 'example1.jpg',
                'picture_2' => 'example2.jpg',
                'picture_3' => 'example3.jpg',
                'picture_4' => 'example4.jpg',
                'picture_5' => 'example5.jpg',
                'is_validated' => true,
            ],
            [
                'username' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'category' => $categories[array_rand($categories)],
                'city' => $cities[array_rand($cities)],
                'title' => 'Example Announcement 2',
                'description' => 'This is another example announcement.',
                'price' => 200.00,
                'picture_1' => 'example6.jpg',
                'picture_2' => 'example7.jpg',
                'picture_3' => 'example8.jpg',
                'picture_4' => 'example9.jpg',
                'picture_5' => 'example10.jpg',
                'is_validated' => false,
            ],
            [
                'username' => 'Mark Johnson',
                'email' => 'markjohnson@example.com',
                'category' => $categories[array_rand($categories)],
                'city' => $cities[array_rand($cities)],
                'title' => 'Example Announcement 3',
                'description' => 'This is a sample announcement.',
                'price' => 150.00,
                'picture_1' => 'example11.jpg',
                'picture_2' => 'example12.jpg',
                'picture_3' => 'example13.jpg',
                'picture_4' => 'example14.jpg',
                'picture_5' => 'example15.jpg',
                'is_validated' => true,
            ],
            [
                'username' => 'Adam Smith',
                'email' => 'adamsmith@example.com',
                'category' => $categories[array_rand($categories)],
                'city' => $cities[array_rand($cities)],
                'title' => 'Example Announcement 4',
                'description' => 'This is another example announcement.',
                'price' => 250.00,
                'picture_1' => 'example16.jpg',
                'picture_2' => 'example17.jpg',
                'picture_3' => 'example18.jpg',
                'picture_4' => 'example19.jpg',
                'picture_5' => 'example20.jpg',
                'is_validated' => false,
            ],
            [
                'username' => 'Sarah Thompson',
                'email' => 'sarahthompson@example.com',
                'category' => $categories[array_rand($categories)],
                'city' => $cities[array_rand($cities)],
                'title' => 'Example Announcement 5',
                'description' => 'This is another example announcement.',
                'price' => 300.00,
                'picture_1' => 'example21.jpg',
                'picture_2' => 'example22.jpg',
                'picture_3' => 'example23.jpg',
                'picture_4' => 'example24.jpg',
                'picture_5' => 'example25.jpg',
                'is_validated' => true,
            ],
            [
                'username' => 'Michael Davis',
                'email' => 'michaeldavis@example.com',
                'category' => $categories[array_rand($categories)],
                'city' => $cities[array_rand($cities)],
                'title' => 'Example Announcement 6',
                'description' => 'This is another example announcement.',
                'price' => 400.00,
                'picture_1' => 'example26.jpg',
                'picture_2' => 'example27.jpg',
                'picture_3' => 'example28.jpg',
                'picture_4' => 'example29.jpg',
                'picture_5' => 'example30.jpg',
                'is_validated' => false,
            ],
            [
                'username' => 'Emily Wilson',
                'email' => 'emilywilson@example.com',
                'category' => $categories[array_rand($categories)],
                'city' => $cities[array_rand($cities)],
                'title' => 'Example Announcement 7',
                'description' => 'This is another example announcement.',
                'price' => 350.00,
                'picture_1' => 'example31.jpg',
                'picture_2' => 'example32.jpg',
                'picture_3' => 'example33.jpg',
                'picture_4' => 'example34.jpg',
                'picture_5' => 'example35.jpg',
                'is_validated' => true,
            ],
            [
                'username' => 'David Johnson',
                'email' => 'davidjohnson@example.com',
                'category' => $categories[array_rand($categories)],
                'city' => $cities[array_rand($cities)],
                'title' => 'Example Announcement 8',
                'description' => 'This is another example announcement.',
                'price' => 500.00,
                'picture_1' => 'example36.jpg',
                'picture_2' => 'example37.jpg',
                'picture_3' => 'example38.jpg',
                'picture_4' => 'example39.jpg',
                'picture_5' => 'example40.jpg',
                'is_validated' => false,
            ],
            [
                'username' => 'Sophia Anderson',
                'email' => 'sophiaanderson@example.com',
                'category' => $categories[array_rand($categories)],
                'city' => $cities[array_rand($cities)],
                'title' => 'Example Announcement 9',
                'description' => 'This is another example announcement.',
                'price' => 450.00,
                'picture_1' => 'example41.jpg',
                'picture_2' => 'example42.jpg',
                'picture_3' => 'example43.jpg',
                'picture_4' => 'example44.jpg',
                'picture_5' => 'example45.jpg',
                'is_validated' => true,
            ],
            [
                'username' => 'Oliver Thompson',
                'email' => 'oliverthompson@example.com',
                'category' => $categories[array_rand($categories)],
                'city' => $cities[array_rand($cities)],
                'title' => 'Example Announcement 10',
                'description' => 'This is another example announcement.',
                'price' => 550.00,
                'picture_1' => 'example46.jpg',
                'picture_2' => 'example47.jpg',
                'picture_3' => 'example48.jpg',
                'picture_4' => 'example49.jpg',
                'picture_5' => 'example50.jpg',
                'is_validated' => false,
            ],
            // Add more announcements here
        ];

        foreach ($announcements as $announcement) {
            Announcement::create($announcement);
        }
    }
}
