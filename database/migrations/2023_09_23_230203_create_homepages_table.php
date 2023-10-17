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
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->String('image_on_left');
            $table->string('title_image_left');
            $table->String('description_image_left');
            $table->String('men_image');
            $table->string('description_men_image');
            $table->String('women_image');
            $table->string('description_women_image');
            $table->String('kid_image');
            $table->string('description_kid_image');
            $table->timestamps();
        });
        Schema::dropIfExists('homepages');
    }
    public function down(): void
    {

        Schema::dropIfExists('homepages');
    }
};
