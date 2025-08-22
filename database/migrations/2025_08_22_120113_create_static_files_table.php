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
        Schema::create('static_files', function (Blueprint $table) {
            $table->id();
            $table->string('theme_key',10);
            $table->string('file_path');
            $table->string('mime_type',30);
            $table->string('name')->nullable();
            $table->text('alt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_files');
    }
};
