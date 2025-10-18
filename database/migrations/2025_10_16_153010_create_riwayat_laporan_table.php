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
        Schema::create('riwayat_laporan', function (Blueprint $table) {
            $table->id('id_riwayat');
            $table->unsignedBigInteger('id_laporan');
            $table->enum('status' ,['Menunggu','Diproses','Selesai']);
            $table->unsignedBigInteger('diubah_oleh')->comment('User yang mengubah status');
            $table->timestamp('diubah_pada')->useCurrent();

            $table->foreign('id_laporan')->references('id_laporan')->on('laporan')->onDelete('cascade');
            $table->foreign('diubah_oleh')->references('id')->on('users')->onDelete('cascade');

             // Index
            $table->index('id_laporan');
            $table->index('diubah_pada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_riwayat_laporan');
    }
};
