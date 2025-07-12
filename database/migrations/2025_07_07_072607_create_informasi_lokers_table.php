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
        Schema::create('informasi_lokers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_loker_id')->references('id')->on('kategori_lokers')->onDelete('cascade');
            $table->string('judul', 255);
            $table->text('lokasi');
            $table->string('gaji')->nullable();
            $table->text('persyaratan');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_lokers');
    }
};
