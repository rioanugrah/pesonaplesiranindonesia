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
        Schema::create('trips', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('trip_code');
            $table->enum('trip_category',['O','P']);
            $table->string('trip_name');
            $table->text('trip_description');
            $table->text('trip_experience');
            $table->text('trip_facilities');
            $table->text('trip_tour_plan');
            $table->text('trip_images');
            $table->text('trip_gallery');
            $table->decimal('trip_price', 16, 2);
            $table->enum('status',['Active','NonActive'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('trip_extras', function (Blueprint $table) {
            $table->id();
            $table->uuid('trip_id');
            $table->string('extra_name');
            $table->decimal('extra_price', 16, 2);
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
        Schema::dropIfExists('trip_extras');
    }
};
