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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->longText('body');
            // $table->unsignedBigInteger('user_id'); //dichiaro la chiave esterna
            // $table->foreign('user_id')->references('id')->on('users'); //creo collegamento integrità referenziale , aggiungo user id alla tabella song per capire chi lo ha creato lalbum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
