<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Adding indexes to frequently queried fields. The 'is_active' column
     * is widely used across these tables in where clauses on user-facing
     * pages, and 'event_date' is frequently used for sorting. Adding these
     * indexes will prevent full table scans.
     */
    public function up(): void
    {
        Schema::table('schemes', function (Blueprint $table) {
            $table->index('is_active');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->index('is_active');
            $table->index('event_date');
        });

        Schema::table('documentations', function (Blueprint $table) {
            $table->index('is_active');
        });

        Schema::table('asesors', function (Blueprint $table) {
            $table->index('is_active');
        });

        Schema::table('tempat_ujis', function (Blueprint $table) {
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schemes', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['event_date']);
        });

        Schema::table('documentations', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
        });

        Schema::table('asesors', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
        });

        Schema::table('tempat_ujis', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
        });
    }
};
