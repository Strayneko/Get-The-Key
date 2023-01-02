<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id' => 1,
            'shop_id' => 1,
            'name' => 'Microsoft Excel',
            'price' => 300000,
            'description' => 'aplikasi keren untuk kerja',
            'image' => 'image/product/excel.jpg',
            'licensing_term' => 30,
            'manufacture' => 'Microsoft',
            'max_user' => 5
        ]);
    }
}
