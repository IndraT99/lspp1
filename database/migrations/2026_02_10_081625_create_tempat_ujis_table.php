<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tempat_ujis', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Tempat Uji
            $table->text('address'); // Alamat
            $table->integer('capacity')->nullable(); // Kapasitas Peserta
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tempat_ujis');
    }
};
