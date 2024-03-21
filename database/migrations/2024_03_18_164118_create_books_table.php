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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id_buku')->primary();
            $table->string('gambar_buku')->nullable();
            $table->string('nama_buku');
            $table->string('kelas_buku');
            $table->string('nomer_rak_buku');
            $table->string('isbn_buku')->unique();
            $table->string('penerbit_buku');
            $table->string('penulis_buku');
            $table->string('urutan_buku')->nullable();
            $table->string('kode_buku')->nullable();
            $table->boolean('buku_is_deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};