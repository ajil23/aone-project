<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Petugas',
                'nomor'=>'202301',
                'role'=>'petugas',
                'password'=>bcrypt('12345678')
            ],

            [
                'name'=>'Nakes',
                'nomor'=>'202302',
                'role'=>'nakes',
                'password'=>bcrypt('12345678')
            ],

            [
                'name'=>'Pasien',
                'nomor'=>'202303',
                'role'=>'pasien',
                'password'=>bcrypt('12345678')
            ],
        ];

        foreach ($userData as $key => $val ){
            User::create($val);
        }
    }
}
