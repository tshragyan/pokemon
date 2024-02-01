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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(true);
            $table->string('image');
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('ability_id');
            $table->unsignedBigInteger('location_id');
            $table->timestamps();

            $table->foreign('form_id')
                ->references('id')
                ->on('pokemon_forms')
                ->cascadeOnDelete();

            $table->foreign('ability_id')
                ->references('id')
                ->on('abilities')
                ->cascadeOnDelete();

            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
