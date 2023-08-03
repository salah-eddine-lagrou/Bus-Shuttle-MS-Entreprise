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
        Schema::create('date_abonnements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_abonnement')->nullable();
            $table->foreign('id_abonnement')->references('id')->on('abonnements')->onDelete('set null');
            $table->unsignedBigInteger('id_jour')->nullable();
            $table->foreign('id_jour')->references('id')->on('jours')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_abonnements');
    }
};
