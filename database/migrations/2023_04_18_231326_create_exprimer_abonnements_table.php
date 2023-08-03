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
        Schema::create('exprimer_abonnements', function (Blueprint $table) {
            $table->id();
            $table->string('depart')->nullable();
            $table->string('destination')->nullable();
            $table->text('description');
            $table->integer('likes')->nullable();
            $table->integer('dislikes')->nullable();
            $table->unsignedBigInteger('id_type_abonnement')->nullable();
            $table->foreign('id_type_abonnement')->references('id')->on('type_abonnements')->onDelete('set null');
            $table->unsignedBigInteger('id_client')->nullable();
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('set null');
            $table->time('heur_debut_aller')->nullable();
            $table->time('heur_debut_retour')->nullable();
            $table->string('nom_abonnement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exprimer_abonnements');
    }
};
