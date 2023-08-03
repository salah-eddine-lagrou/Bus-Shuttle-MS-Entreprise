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
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->string('depart');
            $table->string('destination');
            $table->string('trajet');
            $table->time('heur_debut_aller');
            $table->time('heur_fin_aller');
            $table->time('heur_debut_retour');
            $table->time('heur_fin_retour');
            $table->unsignedBigInteger('id_abonnement')->nullable();
            $table->foreign('id_abonnement')->references('id')->on('abonnements')->onDelete('set null');
            $table->unsignedBigInteger('id_etatVoyage')->nullable();
            $table->foreign('id_etatVoyage')->references('id')->on('etat_voyages')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyages');
    }
};
