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
        Schema::create('sede_grado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('grado_id');

            $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');
            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sede_grado');
    }
};
