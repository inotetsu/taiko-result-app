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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('song_id')->constrained();
            $table->integer('good_count')->nullable();
            $table->integer('ok_count')->nullable();
            $table->integer('miss_count')->nullable();
            $table->integer('roll_count')->nullable();
            $table->integer('full_combo')->default(0);
            $table->integer('donda_full_combo')->default(0);
            $table->integer('play_count')->default(0);
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
