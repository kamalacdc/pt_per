<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');         // nama cabang
            $table->string('address');      // alamat
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('map_embed')->nullable(); // iframe map Google
            $table->boolean('is_active')->default(true); // <── tambahkan
            $table->integer('sort')->default(0);         // <── tambahkan
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('branches');
    }
};
