
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomToursTable extends Migration
{
    public function up(): void
    {
        Schema::create('custom_tours', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->unsignedInteger('group_size');
            $table->string('destinations');
            $table->date('start_date')->nullable();
            $table->unsignedInteger('duration');
            $table->text('interests')->nullable();
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_tours');
    }
}
