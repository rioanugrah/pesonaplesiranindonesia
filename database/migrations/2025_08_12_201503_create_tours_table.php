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
        Schema::create('tours', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tour_code',100);
            $table->string('tour_name');
            $table->text('tour_description');
            $table->text('tour_experience');
            $table->text('tour_plan');
            $table->text('tour_map');
            $table->integer('tour_quantity');
            $table->string('tour_price');
            $table->text('tour_images');
            $table->enum('tour_status',['active','inactive','soldout']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tour_extras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tour_id');
            $table->string('tour_extra');
            $table->string('tour_extra_price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
        Schema::dropIfExists('tour_extras');
    }
};
