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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->String('left_image');
            $table->String('about_us');
            $table->String('facebook')->default('#');
            $table->String('instagram')->default('#');
            $table->String('behance')->default('#');
            $table->String('store_location');
            $table->String('work_hours');
            $table->String('phone');
            $table->String('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
