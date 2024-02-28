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
        Schema::create('driver_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('age');
            $table->string('cnic');
            $table->text('address');
            $table->string('location');
            $table->json('driver_personal_info');
            $table->integer('price_per_day');
            $table->string('vehicle_type');
            $table->boolean('availability')->default(true);
            $table->string('model');
            $table->string('manufacturer');
            $table->timestamps();
        });

        Schema::table('driver_details', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_details');
    }
};
