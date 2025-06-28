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
        Schema::create('mahasiswa_models', function (Blueprint $table) {
            $table->String('nim')->primary();
            $table->String('nama');
            $table->String('jk');
            $table->String('tgl_lahir');
            $table->String('jurusan');
            $table->String('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_models');
    }
};
