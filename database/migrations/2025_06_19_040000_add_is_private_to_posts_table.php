<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // is_private already exists in posts table, so skip this migration step
        // Schema::table('posts', function (Blueprint $table) {
        //     $table->boolean('is_private')->default(false)->after('arc_id');
        // });
    }

    public function down(): void
    {
        if (Schema::hasColumn('posts', 'is_private')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('is_private');
            });
        }
    }
};
