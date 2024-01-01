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
        Schema::create('love_stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date');
            $table->string('photo')->nullable();
            $table->text('content');
            $table->unsignedBigInteger('user_web_id')->nullable();
            $table->foreign('user_web_id')->references('id')->on('user_webs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('love_stories');
    }
};
