<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dataUser = [
            [
                'name' => 'Hafidz Fadhillah',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'address' => 'Jl. Nangka',
                'role' => 'admin'
            ],
            [
                'name' => 'Dita Safira',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678'),
                'address' => 'Jl. A Yani',
                'role' => 'user'
            ],
        ];

        foreach ($dataUser as $data) {
            User::create($data);
        }
    }
}
