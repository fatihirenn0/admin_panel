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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('photo_category_id')->nullable();
            $table->text('name')->nullable();
            $table->text('image')->nullable();
            $table->unsignedInteger('rank')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('photo_category_id')->references('id')->on('photo_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
