<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('segments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('serial_number')->default(0);
            
            // Hero Section Fields
            $table->string('hero_section_title')->nullable();
            $table->string('hero_section_subtitle')->nullable();
            $table->text('hero_section_text')->nullable();
            $table->string('hero_section_button_text')->nullable();
            $table->string('hero_section_button_url')->nullable();
            $table->string('hero_section_secound_button_text')->nullable();
            $table->string('hero_section_secound_button_url')->nullable();
            
            // Hero Images
            $table->string('hero_img')->nullable();
            $table->string('hero_img2')->nullable();
            $table->string('hero_img3')->nullable();
            $table->string('hero_img4')->nullable();
            $table->string('hero_img5')->nullable();
            
            // Custom CSS/JS
            $table->longText('custom_css')->nullable();
            $table->longText('custom_js')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('segments');
    }
};
