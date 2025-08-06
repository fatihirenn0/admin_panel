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
        Schema::create('video_video_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_id');
            $table->unsignedBigInteger('video_category_id');

            $table->foreign('video_id')->references('id')->on('videos');
            $table->foreign('video_category_id')->references('id')->on('video_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_video_categories');
    }
};
