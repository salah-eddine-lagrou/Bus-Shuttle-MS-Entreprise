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
        Schema::create('notes_commentaires', function (Blueprint $table) {
            $table->id();
            $table->integer('likes')->nullable();
            $table->integer('dislikes')->nullable();
            $table->unsignedBigInteger('id_client')->nullable();
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('set null');
            $table->unsignedBigInteger('id_entreprise')->nullable();
            $table->foreign('id_entreprise')->references('id')->on('entreprises')->onDelete('set null');
            $table->unsignedBigInteger('id_exprimer_abonnement')->nullable();
            $table->foreign('id_exprimer_abonnement')->references('id')->on('exprimer_abonnements')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes_commentaires');
    }
};
