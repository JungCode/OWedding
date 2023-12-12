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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('ticket');
            $table->string('invitation_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('event');
            $table->unsignedBigInteger('group_id');
            $table->string('confirmation');
            $table->integer('go_with');
            $table->unsignedBigInteger('wedding_money')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('guest_groups')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
