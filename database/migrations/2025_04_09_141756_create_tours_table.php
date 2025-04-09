<?php
// database/migrations/xxxx_xx_xx_create_tours_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('region');
            $table->string('image'); // Store relative path or URL
            $table->text('description');
            $table->text('details')->nullable(); // Full tour info
            $table->string('duration')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tours');
    }
};
