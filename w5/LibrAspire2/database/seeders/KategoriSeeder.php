<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategori = [
            ['name' => 'Self-Growth'],
            ['name' => 'Fiction & Literature'],
            ['name' => 'Science & Tech'],
            ['name' => 'Life & History'],
            ['name' => 'Leisure & Hobbies'],
            ['name' => 'Religion'],
        ];

        DB::table('kategori')->insert($kategori);
    }
}