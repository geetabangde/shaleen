<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('module_records', function (Blueprint $table) {
    $table->id();
    $table->foreignId('module_id')->constrained('modules')->onDelete('cascade');
    $table->json('data');
    $table->timestamps();
    $table->engine = 'InnoDB'; 
});

    }

    public function down(): void
    {
        Schema::dropIfExists('module_records');
    }
};
