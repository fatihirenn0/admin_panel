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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('slug');
            $table->string('code')->nullable();
            $table->string('barcode')->nullable();
            $table->float('price',15,2)->unsigned()->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('tags')->nullable();
            $table->text('cover')->nullable();
            $table->text('video_url')->nullable();
            $table->unsignedInteger('rank')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
