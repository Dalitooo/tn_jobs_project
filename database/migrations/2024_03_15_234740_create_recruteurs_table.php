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
        Schema::create('recruteurs', function (Blueprint $table) {
            $table->id()->uniqid();
            $table->foreignId('user_id')->unique()->constrained('users');
            $table->string('nom');
            $table->string('prenom');
            $table->string('nom_entreprise');
            $table->string('adresse');
            $table->string('tel');
            $table->string('logo');
            $table->boolean('verif')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruteurs');
    }
};
