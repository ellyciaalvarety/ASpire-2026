<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('peminjaman')->insert([
            [
                'user_id' => 3,
                'buku_id' => 1,
                'tanggal_pinjam' => Carbon::now()->subDays(5),
                'tanggal_kembali' => Carbon::now()->addDays(5),
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'buku_id' => 10,
                'tanggal_pinjam' => Carbon::now()->subDays(10),
                'tanggal_kembali' => Carbon::now()->subDays(2),
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'buku_id' => 7,
                'tanggal_pinjam' => Carbon::now()->subDays(7),
                'tanggal_kembali' => Carbon::now()->subDays(1),
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'buku_id' => 9,
                'tanggal_pinjam' => Carbon::now()->subDays(10),
                'tanggal_kembali' => Carbon::now()->subDays(2),
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'buku_id' => 8,
                'tanggal_pinjam' => Carbon::now()->subDays(7),
                'tanggal_kembali' => Carbon::now()->subDays(1),
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}