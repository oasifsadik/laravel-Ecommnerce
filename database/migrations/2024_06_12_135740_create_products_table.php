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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cat_id');
            $table->string('product_slug');
            $table->string('product_name');
            $table->integer('product_quantity');
            $table->decimal('buying_price',8,2);
            $table->decimal('selling_price',8,2);
            $table->decimal('discount_price',8,2)->nullable();
            $table->enum('discount_type',['TK','Percentages'])->nullable();
            $table->decimal('discount_value',8,2)->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->enum('action',['Active','In-Active'])->default('In-Active');
            $table->longText('description')->nullable();
            $table->string('thumbnail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
