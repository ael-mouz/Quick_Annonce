<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('title');
            $table->string('phone');
            $table->text('description');
            $table->float('price');
            $table->string('picture_1');
            $table->string('picture_2');
            $table->string('picture_3');
            $table->string('picture_4');
            $table->string('picture_5');
            $table->boolean('is_validated')->default(0);
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('categories');
            $table->unsignedBigInteger('city');
            $table->foreign('city')->references('id')->on('cities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
