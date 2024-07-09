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
        Schema::create('nilai_karyawan', function (Blueprint $table) {
            $table->id('id_nilai_karyawan');
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_alternative');
            $table->unsignedBigInteger('id_kriteria');
            $table->unsignedBigInteger('id_nilai_alternative');
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
            $table->foreign('id_alternative')->references('id_nilai_alternative')->on('nilai_alternative');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria');
            $table->foreign('id_nilai_alternative')->references('id_nilai_alternative')->on('nilai_alternative');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_karyawan');
    }
};
