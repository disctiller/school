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
        Schema::create('grupo_estudiante', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grado_grupo_id');
            $table->unsignedBigInteger('estudiante_id');

            $table->foreign('grado_grupo_id')->references('id')->on('grado_grupo');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_estudiante');
    }
};
