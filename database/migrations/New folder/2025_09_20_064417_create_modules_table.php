<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->string('name')->unique()->comment('Name of the module');
            $table->boolean('allow_edit')->default(true)->comment('Whether module can be edited');
            $table->boolean('allow_delete')->default(true)->comment('Whether module can be deleted');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
