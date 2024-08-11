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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('country');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('company_name')->nullable();;
            $table->string('address');
            $table->string('street_address')->nullable();
            $table->string('city');
            $table->string('state_county');
            $table->string('postcode');
            $table->string('phone');
            $table->string('total_price');
            $table->string('payment_method');
            $table->string('payment_id')->nullable();
            $table->enum('status',['Pending','Order Confirmed','Shipped','Canceled','Delivered'])->default('Pending');
            $table->string('tracking_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
