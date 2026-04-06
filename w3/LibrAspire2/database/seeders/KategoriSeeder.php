<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategori = [
            ['name' => 'Fiksi'],
            ['name' => 'Non-Fiksi'],
            ['name' => 'Pendidikan'],
            ['name' => 'Teknologi'],
            ['name' => 'Sejarah'],
            ['name' => 'Biografi'],
            ['name' => 'Agama'],
            ['name' => 'Komik'],
            ['name' => 'Majalah'],
            ['name' => 'Novel'],
        ];

        DB::table('kategori')->insert($kategori);
    }
}