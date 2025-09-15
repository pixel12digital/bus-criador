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
        // Adicionar segment_id na tabela packages
        Schema::table('packages', function (Blueprint $table) {
            $table->unsignedBigInteger('segment_id')->nullable()->after('id');
            $table->foreign('segment_id')->references('id')->on('segments')->onDelete('set null');
        });

        // Adicionar segment_id na tabela features
        Schema::table('features', function (Blueprint $table) {
            $table->unsignedBigInteger('segment_id')->nullable()->after('id');
            $table->foreign('segment_id')->references('id')->on('segments')->onDelete('set null');
        });

        // Adicionar segment_id na tabela processes
        Schema::table('processes', function (Blueprint $table) {
            $table->unsignedBigInteger('segment_id')->nullable()->after('id');
            $table->foreign('segment_id')->references('id')->on('segments')->onDelete('set null');
        });

        // Adicionar segment_id na tabela testimonials
        Schema::table('testimonials', function (Blueprint $table) {
            $table->unsignedBigInteger('segment_id')->nullable()->after('id');
            $table->foreign('segment_id')->references('id')->on('segments')->onDelete('set null');
        });

        // Adicionar segment_id na tabela partners
        Schema::table('partners', function (Blueprint $table) {
            $table->unsignedBigInteger('segment_id')->nullable()->after('id');
            $table->foreign('segment_id')->references('id')->on('segments')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropForeign(['segment_id']);
            $table->dropColumn('segment_id');
        });

        Schema::table('features', function (Blueprint $table) {
            $table->dropForeign(['segment_id']);
            $table->dropColumn('segment_id');
        });

        Schema::table('processes', function (Blueprint $table) {
            $table->dropForeign(['segment_id']);
            $table->dropColumn('segment_id');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropForeign(['segment_id']);
            $table->dropColumn('segment_id');
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->dropForeign(['segment_id']);
            $table->dropColumn('segment_id');
        });
    }
};
