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
        Schema::create('partners', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('partner_code');
            $table->string('partner_name');
            $table->text('partner_address');
            $table->enum('partner_category',['Influencer', 'Travel Agent', 'Hotel', 'Corporate']);
            $table->string('partner_referral_code');
            $table->decimal('partner_fee_percentage', 5, 2)->nullable();
            $table->string('partner_contact');
            $table->string('partner_email');
            $table->string('partner_bank');
            $table->string('partner_norek');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('partner_commissions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('partner_id');
            $table->uuid('booking_id');
            $table->string('total');
            $table->string('total_commission');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
        Schema::dropIfExists('partner_commissions');
    }
};
