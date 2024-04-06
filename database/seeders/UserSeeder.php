<?php

namespace Database\Seeders;

use App\Models\User;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Administrator', 'email' => 'administrator@gmail.com', 'email_verified_at' => null, 'role' => 'administrator', 'password' => Hash::make('Mysql@2023'), 'remember_token' => null, 'created_at' => date(now()), 'updated_at' => null],
            ['name' => 'Petugas', 'email' => 'petugas@gmail.com', 'email_verified_at' => null, 'role' => 'petugas', 'password' => Hash::make('Mysql@2023'), 'remember_token' => null, 'created_at' => date(now()), 'updated_at' => null],
            ['name' => 'Peminjam', 'email' => 'peminjam@gmail.com', 'email_verified_at' => null, 'role' => 'peminjam', 'password' => Hash::make('Mysql@2023'), 'remember_token' => null, 'created_at' => date(now()), 'updated_at' => null],
        ];

        foreach ($data as $val) {
            User::insert(['name' => $val['name'], 'email' => $val['email'], 'email_verified_at' => $val['email_verified_at'], 'role' => $val['role'], 'password' => $val['password'], 'remember_token' => $val['remember_token'], 'created_at' => $val['created_at'], 'updated_at' => $val['updated_at']]);
        }
    }
}
