<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert(
            [
                [
                    'name' => 'Office',
                    'image' => 'tes.jpg'
                ],
                [
                    'name' => 'Video Editing',
                    'image' => 'tes.jpg'
                ]
            ]
        );
    }
}
