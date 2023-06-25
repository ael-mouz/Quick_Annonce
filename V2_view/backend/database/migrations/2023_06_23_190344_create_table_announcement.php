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
        Schema::create('announcement', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('city');
            $table->string('title');
            $table->string('description');
            $table->float('price');
            $table->string('picture_1');
            $table->string('picture_2');
            $table->string('picture_3');
            $table->string('picture_4');
            $table->string('picture_5');
            $table->boolean('is_validated')->default(false);
            $table->foreign('category')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city')->references('id')->on('city')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement');
    }
};
