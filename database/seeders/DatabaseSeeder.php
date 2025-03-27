<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=> 'Admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('admin123'),
         ]);
        User::create([
            'name'=> 'Muhammad Alvin',
            'email'=>'Alvin@user.com',
            'password' => Hash::make('user123'),
         ]);
        User::create([
            'name'=> 'Yoga Saputra',
            'email'=>'yoga@user.com',
            'password' => Hash::make('user123'),
         ]);

         Buku::create([
            'id'=>'1',
            'user_id'=>'1',
            'judul' => 'Belajar Pemprograman Berbasis Web',
            'penulis' => 'Ajeng M',
            'tahun_terbit'=> '2025-03-01',
            'kategori' => 'komputer',
            'deskripsi' => 'Buku ini mempelajari pemrograman dasar adalah langkah penting untuk memahami bagaimana komputer bekerja dan menciptakan solusi digital. Mulailah dengan memahami konsep dasar, pilih bahasa pemrograman yang sesuai, dan praktikkan dengan proyek sederhana. ',

         ]);
         Buku::create([
            'id'=>'2',
            'user_id'=>'1',
            'judul' => 'Sejarah Indonesia',
            'penulis' => 'Rohani M',
            'tahun_terbit'=> '2025-01-01',
            'kategori' => 'Sejarah',
            'deskripsi' => 'Didalam buku ini, dihadirkan secara lengkap dan komprehensif sejarah Indonesia sejak era prasejarah, era prakolanial, era kolonial',
         ]);
         Buku::create([
            'id'=>'3',
            'user_id'=>'2',
            'judul' => 'Matematika Dasar',
            'penulis' => 'Wahyu S',
            'tahun_terbit'=> '2024-03-01',
            'kategori' => 'Sains',
            'deskripsi' => 'Buku ini mencakup konsep-konsep dasar seperti penjumlahan, pengurangan, perkalian, pembagian, pecahan, desimal, persentase, dan konsep-konsep aljabar dasar. ',
         ]);
         Buku::create([
            'id'=>'4',
            'user_id'=>'2',
            'judul' => 'Matematika Diskrit',
            'penulis' => 'Selamet A',
            'tahun_terbit'=> '2022-03-01',
            'kategori' => 'Sains',
            'deskripsi' => 'Buku ini adalah cabang ilmu matematika yang mempelajari objek-objek yang diskrit, yaitu tidak saling berhubungan. Objek-objek tersebut memiliki nilai tertentu dan terpisah. ',
         ]);
    }
}
