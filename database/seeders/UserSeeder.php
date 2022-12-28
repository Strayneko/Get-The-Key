<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'        => 'admin@admin.com',
            'password'     => Hash::make('admin'),
            'name'    => 'admin',
            'phone_number' => '087836722420',
            'birth_date'   => '06-06-2002',
            'gender'       => 1,
            'address'      => 'pemalang',
            'picture'      => 'tes.jpg'
        ]);
    }
}
