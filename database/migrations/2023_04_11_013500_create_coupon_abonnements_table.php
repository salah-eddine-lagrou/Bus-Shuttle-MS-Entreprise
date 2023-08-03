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
        Schema::create('coupon_abonnements', function (Blueprint $table) {
            $table->id();
            $table->date('date_creation');
            $table->date('date_expiration');
            $table->string('code');
            $table->unsignedBigInteger('id_paiement')->nullable();
            $table->foreign('id_paiement')->references('id')->on('paiements')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_abonnements');
    }
};
