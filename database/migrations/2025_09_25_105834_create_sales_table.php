<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Date
            $table->string('sales_order_id')->unique(); // Sales Order ID
            $table->string('broker_name')->nullable();
            $table->string('party_name');
            $table->string('item');
            $table->decimal('quantity', 12, 2)->default(0);
            $table->integer('bags')->default(0);
            $table->string('brand')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->text('remark')->nullable();
            $table->text('loading_history_pending_balance')->nullable(); // Overbilling / Underbilling
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};