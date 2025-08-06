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
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catalog_category_id');
            $table->text('name')->nullable();
            $table->text('slug')->nullable();
            $table->text('cover')->nullable();
            $table->text('file')->nullable()->comment('for uploaded file');
            $table->text('url')->nullable()->comment('for extended link');
            $table->text('description')->nullable();
            $table->unsignedInteger('rank')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('catalog_category_id')->references('id')->on('catalog_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
