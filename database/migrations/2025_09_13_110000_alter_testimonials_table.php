<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->renameColumn('position', 'title');
            $table->renameColumn('message', 'body');
            $table->renameColumn('photo', 'photo_path');
            $table->dropColumn('is_active');
            $table->date('published_at')->nullable()->after('body');
        });
    }

    public function down(): void {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('published_at');
            $table->boolean('is_active')->default(true);
            $table->renameColumn('photo_path', 'photo');
            $table->renameColumn('body', 'message');
            $table->renameColumn('title', 'position');
        });
    }
};
