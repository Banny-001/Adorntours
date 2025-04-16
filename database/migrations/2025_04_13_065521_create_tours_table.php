<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('country');
            $table->string('region');
            $table->string('destination'); // ✅ Newly added field
            $table->string('image')->nullable(); // Will store path to uploaded image
            $table->text('short_description');
            $table->text('full_description');
            $table->string('duration');
            $table->decimal('price', 10, 2);
            $table->boolean('is_featured')->default(false);
            $table->integer('min_group_size')->nullable();
            $table->integer('max_group_size')->nullable();
            $table->json('included')->nullable(); // JSON array of included features
            $table->json('not_included')->nullable(); // JSON array of excluded features
            $table->json('itinerary')->nullable(); // JSON array of itinerary items
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tours');
    }
};
