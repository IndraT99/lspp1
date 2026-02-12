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
        Schema::table('schemes', function (Blueprint $table) {
            $table->integer('unit_count')->nullable()->after('name');
            $table->string('packaging_type')->nullable()->after('unit_count');
            $table->string('document_path')->nullable()->after('packaging_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schemes', function (Blueprint $table) {
            $table->dropColumn(['unit_count', 'packaging_type', 'document_path']);
        });
    }
};
