<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Vehicles',
                'children' => [
                    ['name' => 'Cars & Bakkies'],
                    ['name' => 'Motorcycles & Scooters'],
                    ['name' => 'Trailers']
                ]
            ],
            [
                'name' => 'Farming Equipment',
                'children' => [
                    ['name' => 'Tractors'],
                    ['name' => 'Tillers'],
                    ['name' => 'Trenchers'],
                    ['name' => 'Wood Chippers'],
                ]
            ],
            [
                'name' => 'Property',
                'children' => [
                    ['name' => 'Farm for sale'],
                    ['name' => 'Farm for rent'],
                    ['name' => 'Land for sale'],
                    ['name' => 'Land for rent'],
                    ['name' => 'Houses for sale'],
                    ['name' => 'Houses for rent'],

                ]
            ],
            [
                'name' => 'Animals',
                'children' => [
                    ['name' => 'Pets'],
                    ['name' => 'Livestock'],
                ]
            ],
            [
                'name' => 'Services',
                'children' => [
                    ['name' => 'Construction'],
                    ['name' => 'Events Service'],
                    ['name' => 'Transport'],
                    ['name' => 'Other Services']
                ]
            ],
            [
                'name' => 'Jobs',
                'children' => [
                    ['name' => 'Job Opportunities']
                ]
            ],
            [
                'name' => 'Farmers Wife',
                'children' => [
                    ['name' => 'Food Preserves'],
                    ['name' => 'Fruit and Vegetables'],
                    ['name' => 'Meat']

                ]
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
