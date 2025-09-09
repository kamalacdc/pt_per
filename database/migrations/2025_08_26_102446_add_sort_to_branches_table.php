<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasColumn('branches', 'sort')) {
            Schema::table('branches', function (Blueprint $table) {
                $table->integer('sort')->default(0)->after('id');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('branches', 'sort')) {
            Schema::table('branches', function (Blueprint $table) {
                $table->dropColumn('sort');
            });
        }
    }
};
