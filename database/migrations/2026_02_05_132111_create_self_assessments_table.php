<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('self_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained()->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('competency_units')->onDelete('cascade');
            $table->integer('element_id'); // Assuming element ID is integer, or modify as needed
            $table->boolean('is_competent')->default(false);
            $table->string('evidence_file')->nullable();
            $table->boolean('assessor_verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_assessments');
    }
};
