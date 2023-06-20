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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('location_id')->nullable();
            $table->foreignId('property_status_id')->nullable();
            $table->foreignId('property_type_id')->nullable();
            $table->string('thumbnail', 2048)->nullable();
            $table->longText('description');
            $table->foreignId('user_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->dateTime('date_online')->nullable();
            $table->dateTime('date_offline')->nullable();
            $table->unsignedFloat('price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
