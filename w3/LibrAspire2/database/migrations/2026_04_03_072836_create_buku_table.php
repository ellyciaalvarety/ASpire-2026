<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('buku', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('isbn')->unique(); // ISBN
        $table->string('pengarang');
        $table->string('penerbit');
        $table->integer('tahun_terbit');
        $table->foreignId('kategori_id')->constrained()->cascadeOnDelete();
        $table->text('sinopsis')->nullable(); // Sinopsis
        $table->string('cover')->nullable(); // Foto
        $table->integer('stock')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
