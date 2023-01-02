<?php

namespace Database\Seeders;

use App\Models\License;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        License::create([
            'product_id' => 1,
            'transaction_id' => 0,
            'license_key' => 'NAKB-IKAN-KERE-NSIH',
            'status' => 1
        ]);
    }
}
