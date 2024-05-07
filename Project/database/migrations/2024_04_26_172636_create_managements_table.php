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
        Schema::create('managements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_management_id');
            $table->string('phone', 15);
            $table->text('management');
            $table->unsignedBigInteger('customer_product_id');
            $table->unsignedBigInteger('user_id');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->enum('state', ['Activo', 'Inactivo']);
            $table->foreign('type_management_id')->references('id')->on('types_managements');
            $table->foreign('customer_product_id')->references('id')->on('customer_products');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('managements');
    }
};
