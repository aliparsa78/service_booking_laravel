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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('room_id');
            $table->date('check_in');
            $table->date('check_out');
            $table->enum('status',[
                'pending',
                'confirmed',
                'checked_id',
                'checked_out',
                'cancelled'
            ])->default('pending');
            $table->float('total_price');
            $table->enum('payment_status',[
                'pending',
                'paid',
                'failed',
                'refunded',
            ])->default('pending');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
