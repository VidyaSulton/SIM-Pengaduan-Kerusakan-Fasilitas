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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->string('no_tiket', 20)->unique();
            // Data pelapor
            $table->string('nama_pelapor', 100);
            $table->string('email_pelapor', 100)->nullable();
            $table->string('kontak', 10);
            // Data laporan
            $table->string('nama_barang', 100);
            $table->text('deskripsi_kerusakan')->comment('Deskripsi kerusakan barang');
            $table->string('lokasi', 100);
            $table->string('foto')->nullable()->comment('Path foto kerusakan barang');
            // Data prioritas & status
            $table->enum('tingkat_urgensi', ['Rendah', 'Sedang', 'Tinggi'])->default('Sedang');
            $table->enum('status', ['Menunggu', 'Diproses', 'Selesai'])->default('Menunggu');
            // Data timeline
            $table->timestamp('tgl_lapor')->useCurrent();
            $table->timestamp('tgl_diproses')->nullable();
            $table->timestamp('tgl_selesai')->nullable();
            // Assignment & Result
            $table->unsignedBigInteger('id_admin')->nullable()->comment('Admin yang assign');
            $table->unsignedBigInteger('id_teknisi')->nullable()->comment('Teknisi yang ditugaskan');
            $table->text('catatan_teknisi')->nullable()->comment('Hasil perbaikan');
            
            $table->timestamps();

            // Foreign key
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('set null');
            $table->foreign('id_teknisi')->references('id')->on('users')->onDelete('set null');

            // Indexes untuk Performance
            $table->index('no_tiket');
            $table->index('status');
            $table->index('tgl_lapor');
            $table->index('id_teknisi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_laporan');
    }
};
