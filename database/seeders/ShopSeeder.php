<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            'user_id' => 2,
            'name' => 'Toko Luar Biasa',
            'description' => 'Sebuah toko yang luar biasa sekali. Ayo beli product luar biasa kami',
            'picture' => 'sample/shop.jpg',
            'address' => 'Sebuah alamat'
        ]);
    }
}
