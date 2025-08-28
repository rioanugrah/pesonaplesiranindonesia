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
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('payment_id');
            $table->string('booking_code');
            $table->string('booking_name');
            $table->decimal('total_price', 16, 2);
            $table->enum('status', ['Pending', 'Confirmed', 'Cancelled'])->default('Pending');
            $table->index(['booking_code']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('booking_departures', function (Blueprint $table) {
            $table->id();
            $table->uuid('booking_id');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('num_of_people');
            $table->integer('num_of_adult');
            $table->decimal('people_price', 16, 2);
            $table->decimal('adult_price', 16, 2);
            $table->index(['booking_id']);
            $table->timestamps();
        });

        Schema::create('booking_extras', function (Blueprint $table) {
            $table->id();
            $table->uuid('booking_id');
            $table->string('booking_extra_name');
            $table->integer('booking_extra_price');
            $table->index(['booking_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('booking_departures');
        Schema::dropIfExists('booking_extras');
    }
};
