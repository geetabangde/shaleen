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
        Schema::create('bags', function (Blueprint $table) {
            $table->id();
             $table->date('date')->nullable();
            $table->string('contract_no')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('packing')->nullable();
            $table->integer('number_of_container')->nullable();
            $table->string('marking')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('quantity', 15, 2)->nullable();
            $table->string('broker')->nullable();
            $table->string('delivery_at')->nullable();
            $table->text('remark')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bags');
    }
};
