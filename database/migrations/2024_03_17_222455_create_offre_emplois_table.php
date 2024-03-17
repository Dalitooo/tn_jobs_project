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
        Schema::create('offre_emplois', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recruteur_id')->unique()->constrained('recruteurs');
            $table->string('poste');
            $table->text('description');
            $table->string('exigence');
            $table->date('date_fin_offre');
            $table->string('lieu');
            $table->unsignedDecimal('salaire', 6, 2)->nullable(); // Adding salary field
            $table->boolean('verif')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offre_emplois');
    }
};
