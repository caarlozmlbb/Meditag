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
    Schema::create('materiales_estudio', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_estudiante');
      $table->unsignedBigInteger('id_actividad');
      $table->string('nombre')->nullable();
      $table->timestamp('tiempo')->nullable();
      $table->enum('estado', ['completado', 'incompleto'])->nullable();
      $table->foreign('id_estudiante')->references('id')->on('estudiantes')->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('materiales_estudio');
  }
};
