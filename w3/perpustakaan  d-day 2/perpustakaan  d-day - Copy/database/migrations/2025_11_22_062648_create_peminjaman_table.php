<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained('users');
            $table->foreignID('buku_id')->constrained('buku');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status',['Dipinjam','Dikembalikan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
