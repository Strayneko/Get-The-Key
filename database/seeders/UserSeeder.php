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
        User::insert(
            [
                [
                    'email'        => 'admin@admin.com',
                    'password'     => Hash::make('admin'),
                    'name'    => 'admin',
                    'phone_number' => '087836722420',
                    'birth_date'   => '06-06-2002',
                    'gender'       => 1,
                    'address'      => 'pemalang',
                    'picture'      => 'pictures/user/admin.jpg',
                    'role_id'     => 3,
                ],
                [
                    'email'        => 'fulan@gmail.com',
                    'password'     => Hash::make('fulan123'),
                    'name'    => 'Fulan Kurniawan',
                    'phone_number' => '087836722421',
                    'birth_date'   => '06-06-2002',
                    'gender'       => 1,
                    'address'      => 'pemalang',
                    'picture'      => 'pictures/user/fulan.jpg',
                    'role_id'     => 2
                ],
            ]
        );
    }
}
