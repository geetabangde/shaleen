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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            // 🌾 Raw Material Fields
            $table->date('raw_date')->nullable();
            $table->string('raw_contract_no')->nullable();
            $table->string('raw_buyer_name')->nullable();
            $table->string('raw_seller_name')->nullable();
            $table->string('raw_commodity')->nullable();
            $table->string('raw_specification')->nullable();
            $table->decimal('raw_price', 15, 2)->nullable();
            $table->string('raw_packing')->nullable();
            $table->string('raw_delivery')->nullable();
            $table->integer('raw_quantity')->nullable();
            $table->string('raw_bags_condition')->nullable();
            $table->string('raw_payment_terms')->nullable();
            $table->text('raw_terms_conditions')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
