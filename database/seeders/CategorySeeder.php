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
                    'image' => 'images/category/office.jpg'
                ],
                [
                    'name' => 'Video Editing',
                    'image' => 'images/category/video_editing.jpg'
                ],
                [
                    'name' => 'Operating System',
                    'image' => 'images/category/os.jpg'
                ],
                [
                    'name' => 'Design Graphics',
                    'image' => 'images/category/design_graphics.jpg'
                ],
            ]
        );
    }
}
