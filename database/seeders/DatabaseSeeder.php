<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Str;

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
        //

        User::create([
            'id' => Str::uuid(),
            'name' => 'Admin Perpustakaan',
            'email' => 'adminperpustakaan@gmail.com',
            'password' => bcrypt('bismillah')
        ]);
        // Book
        //1
        // Book::create([
        //     'id_buku' => Str::uuid(),
        //     'gambar_buku' => 'default.png',
        //     'nama_buku' => 'Matematika',
        //     'kelas_buku' => '1',
        //     'nomer_rak_buku' => '1',
        //     'isbn_buku' => '979-462-821-2',
        //     'penerbit_buku' => "Aneka Ilmu",
        //     'penulis_buku' => "Purnomosidi, Wiranto dan endang supadminingsih",
        //     'urutan_buku' => '1',
        //     'kode_buku' => '',
        // ]);
        // //2
        // Book::create([
        //     'id_buku' => Str::uuid(),
        //     'gambar_buku' => 'default.png',
        //     'nama_buku' => 'Belajar Matematika',
        //     'kelas_buku' => '1',
        //     'nomer_rak_buku' => '1',
        //     'isbn_buku' => '979-678-420-3',
        //     'penerbit_buku' => "PT Sarana Panca Karya Nusa",
        //     'penulis_buku' => "Drs Rachmat, M.Pd",
        //     'urutan_buku' => '1b',
        //     'kode_buku' => '',
        // ]);
        // // 3
        // Book::create([
        //     'id_buku' => Str::uuid(),
        //     'gambar_buku' => 'default.png',
        //     'nama_buku' => 'Buku Kerja Matematika Semester 2',
        //     'kelas_buku' => '1',
        //     'nomer_rak_buku' => '1',
        //     'isbn_buku' => '979-734-374-0',
        //     'penerbit_buku' => "Esis the innovate learning",
        //     'penulis_buku' => "Dyah Wiljeng",
        //     'urutan_buku' => '2',
        //     'kode_buku' => '',
        // ]);
        // // 4
        // Book::create([
        //     'id_buku' => Str::uuid(),
        //     'gambar_buku' => 'default.png',
        //     'nama_buku' => 'Cerdas berhitung Matematika',
        //     'kelas_buku' => '3',
        //     'nomer_rak_buku' => '1',
        //     'isbn_buku' => '979-462-93-7',
        //     'penerbit_buku' => "Aneka Ilmu",
        //     'penulis_buku' => "Nur Fajariyah,Devi Tri Ratnawati",
        //     'urutan_buku' => '2',
        //     'kode_buku' => '',
        // ]);
        // // 5
        // Book::create([
        //     'id_buku' => Str::uuid(),
        //     'gambar_buku' => 'default.png',
        //     'nama_buku' => 'Senang Belajar Bahasa Indonesia',
        //     'kelas_buku' => '3',
        //     'nomer_rak_buku' => '1',
        //     'isbn_buku' => '978-602-299-493-0',
        //     'penerbit_buku' => "Yudistira",
        //     'penulis_buku' => "Tim Bina Bahasa",
        //     'urutan_buku' => '1',
        //     'kode_buku' => '',
        // ]);
    }
}
