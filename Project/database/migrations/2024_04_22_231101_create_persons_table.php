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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('identification_type_id');
            $table->string('identification', 20);
            $table->string('person');
            $table->enum('gender', ['Masculino', 'Femenino', 'Otro']);
            $table->string('address');
            $table->unsignedBigInteger('country_id');
            $table->string('phone');
            $table->string('email');
            $table->string('ocupation');
            $table->date('birthdate');
            $table->enum('state', ['Activo', 'Inactivo']);
            $table->foreign('identification_type_id')->references('id')->on('identification_types');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
