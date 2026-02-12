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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('scheme_id')->constrained()->onDelete('cascade');
            $table->date('schedule_date')->nullable();
            $table->enum('status', ['draft', 'submitted', 'verified', 'approved', 'rejected', 'completed'])->default('draft');
            $table->enum('final_result', ['K', 'BK'])->nullable();
            $table->string('certificate_number')->nullable();
            $table->date('issue_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
