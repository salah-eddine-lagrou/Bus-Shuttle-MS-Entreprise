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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation');
            $table->string('marque');
            $table->integer('capacite');
            $table->date('dateMiseEnservice');
            $table->unsignedBigInteger('id_entreprise')->nullable();
            $table->foreign('id_entreprise')->references('id')->on('entreprises')->onDelete('set null');
            $table->unsignedBigInteger('id_abonnement')->nullable();
            $table->foreign('id_abonnement')->references('id')->on('abonnements')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
