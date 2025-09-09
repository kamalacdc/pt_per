<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('image');
            $table->string('category')->nullable(); // 👈 tambah ini
            $table->timestamps();
        });
    }   
    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
    }
};
