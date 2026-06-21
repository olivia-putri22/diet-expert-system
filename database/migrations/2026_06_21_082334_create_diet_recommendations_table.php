<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diet_recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('weight');
            $table->integer('height');
            $table->integer('age');
            $table->string('gender');
            $table->string('activity');
            $table->string('goal');
            $table->integer('calories_result');
            $table->text('breakfast_menu');
            $table->text('lunch_menu');
            $table->text('dinner_menu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diet_recommendations');
    }
};