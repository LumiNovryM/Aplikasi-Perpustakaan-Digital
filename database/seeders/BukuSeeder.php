<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Mysql Fundamentals',
                'sampul' => 'mysql.png',
                'penulis' => 'John Doe',
                'penerbit' => 'John Doe',
                'stock' => 0,
                'tahun_terbit' => 2020,
                'kategori_id' => 1, // Ganti dengan ID kategori yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'JavaScript ES6',
                'sampul' => 'javascript.png',
                'penulis' => 'Maria Chester',
                'penerbit' => 'Maria Chester',
                'stock' => 5,
                'tahun_terbit' => 2021,
                'kategori_id' => 2, // Ganti dengan ID kategori yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kumpulan Syair',
                'sampul' => 'syair.png',
                'penulis' => 'Adam Malik',
                'penerbit' => 'Adam Malik',
                'stock' => 5,
                'tahun_terbit' => 2021,
                'kategori_id' => 2, // Ganti dengan ID kategori yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];
        DB::table('buku')->insert($data);
    }
}
