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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->text('file_url');
            $table->enum('type',['image','video'])->default('image');
            $table->text('title')->nullable();
            $table->text('text')->nullable();
            $table->text('sub_text')->nullable();
            $table->text('link')->nullable();
            $table->text('link_text')->nullable();
            $table->unsignedInteger('rank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
