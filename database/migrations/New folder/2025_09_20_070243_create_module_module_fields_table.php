<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('module_fields', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade')->comment('Reference to module');
            $table->string('label')->comment('Field label');
            $table->string('type')->comment('Field type: text, number, date, file, radio, dropdown, etc.');
            $table->json('options')->nullable()->comment('Options for dropdown/radio/checkbox');
            $table->boolean('required')->default(false)->comment('Whether field is required');
            $table->string('placeholder')->nullable()->comment('Field placeholder');
            $table->string('default_value')->nullable()->comment('Default value if any');
            $table->integer('max_length')->nullable()->comment('Maximum length of input');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('module_fields');
    }
};
