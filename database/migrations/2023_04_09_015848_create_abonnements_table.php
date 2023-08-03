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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->string('trajet');
            $table->integer('duree');
            $table->double('prix');
            $table->string('depart');
            $table->string('destination');
            $table->time('heur_debut_aller');
            $table->time('heur_fin_aller');
            $table->time('heur_debut_retour');
            $table->time('heur_fin_retour');
            $table->unsignedBigInteger('id_offre')->nullable();
            $table->foreign('id_offre')->references('id')->on('offres')->onDelete('set null');
            $table->unsignedBigInteger('id_type_abonnement')->nullable();
            $table->foreign('id_type_abonnement')->references('id')->on('type_abonnements')->onDelete('set null');
            $table->unsignedBigInteger('id_entreprise')->nullable();
            $table->foreign('id_entreprise')->references('id')->on('entreprises')->onDelete('set null');
            // $table->unsignedBigInteger('id_voyage');
            // $table->foreign('id_voyage')->references('id')->on('voyages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};
