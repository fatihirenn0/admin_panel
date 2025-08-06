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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job')->nullable();
            $table->string('email')->nullable();
            $table->string('experience')->nullable();
            $table->string('telephone')->nullable();
            $table->string('file')->nullable();
            $table->string('message',1000)->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->string('department')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
