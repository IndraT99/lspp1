<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('asesors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Asesor
            $table->string('reg_number')->unique(); // No Registrasi (METW)
            $table->foreignId('scheme_id')->nullable()->constrained('schemes')->onDelete('set null'); // Relasi ke Skema (optional)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asesors');
    }
};
