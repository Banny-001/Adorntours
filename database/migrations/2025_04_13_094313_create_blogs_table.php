<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('image_url')->nullable();
            $table->string('category')->default('Education');
            $table->json('tags')->nullable();
            $table->string('author_name');
            $table->string('author_avatar_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->integer('view_count')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('is_featured');
            $table->index('published_at');
            $table->index('category');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};