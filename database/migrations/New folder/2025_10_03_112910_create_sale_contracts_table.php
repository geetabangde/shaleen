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
        Schema::create('sale_contracts', function (Blueprint $table) {
        $table->id();
        $table->string('contract_no');
        $table->string('seller_name');
        $table->string('seller_address');
        $table->string('seller_phone');
        $table->string('buyer_name');
        $table->string('buyer_address');
        $table->string('buyer_nif')->nullable();
        $table->string('broker_name');
        $table->string('commodity');
        $table->string('packing');
        $table->date('shipment_date');
        $table->decimal('price', 12, 2);
        $table->decimal('quantity', 12, 3);
        $table->decimal('total_value', 12, 2);
        $table->string('payment_terms');
        $table->text('documents')->nullable();
        $table->text('seller_bank_details')->nullable();
        $table->longText('terms_conditions')->nullable();
         $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->after('documents');
        $table->text('document_names')->nullable();
        $table->date('contract_date');
         $table->foreignId('created_by')->constrained('admins')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_contracts', function (Blueprint $table) {
        $table->dropColumn('status');
    });
        Schema::dropIfExists('sale_contracts');
    }
};
