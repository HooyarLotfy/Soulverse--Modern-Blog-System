<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // user_id already exists in posts table, so skip this migration step
        // Schema::table('posts', function (Blueprint $table) {
        //     $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null')->after('id');
        // });
    }

    public function down(): void
    {
        // Only drop if the column exists
        if (Schema::hasColumn('posts', 'user_id')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            });
        }
    }
};
