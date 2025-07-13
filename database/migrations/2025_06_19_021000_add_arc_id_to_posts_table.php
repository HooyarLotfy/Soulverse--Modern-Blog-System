<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // arc_id already exists in posts table, so skip this migration step
        // Schema::table('posts', function (Blueprint $table) {
        //     $table->foreignId('arc_id')->nullable()->constrained('arcs')->onDelete('set null');
        // });
    }

    public function down(): void
    {
        // Only drop if the column exists
        if (Schema::hasColumn('posts', 'arc_id')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropForeign(['arc_id']);
                $table->dropColumn('arc_id');
            });
        }
    }
};
