<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sub_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained()->onDelete('cascade'); // references 'id' on 'sales' table
            $table->integer('quantity');
            $table->decimal('sale_price', 10, 2);
            $table->string('mode_terms_of_payment')->nullable()->after('sale_price');
            $table->string('dispatch_doc_no')->nullable()->after('mode_terms_of_payment');
            $table->date('delivery_note_date')->nullable()->after('dispatch_doc_no');
            $table->string('dispatched_through')->nullable()->after('delivery_note_date');
            $table->string('motor_vehicle_no')->nullable()->after('dispatched_through');
            $table->string('terms_of_delivery')->nullable()->after('motor_vehicle_no');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_sales');
    }
}
