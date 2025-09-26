<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('module_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade')->comment('Reference to the module');
            $table->foreignId('module_record_id')->constrained('module_records')->onDelete('cascade')->comment('Reference to the record');
            $table->foreignId('field_id')->nullable()->constrained('module_fields')->onDelete('cascade')->comment('Reference to the field');
            $table->string('file_path')->comment('Path to the uploaded file');
            $table->string('file_name')->comment('Original file name');
            $table->string('file_type')->comment('MIME type of the file');
            $table->unsignedBigInteger('file_size')->comment('File size in bytes');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('module_files');
    }
};
