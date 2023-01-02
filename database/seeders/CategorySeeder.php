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
                    'image' => 'sample/office.png'
                ],
                [
                    'name' => 'Video Editing',
                    'image' => 'sample/video_editing.webp'
                ],
                [
                    'name' => 'Operating System',
                    'image' => 'sample/windows.png'
                ],
                [
                    'name' => 'Design Graphics',
                    'image' => 'sample/design_graphic.png'
                ],
            ]
        );
    }
}
