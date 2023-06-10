<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horario__comercials', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default(Str::uuid());
            $table->string('dia_seman');
            $table->string('hora_inicio');
            $table->string('hora_final');
            $table->foreignId('anuncio_id')->references('id')->on('anuncios')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario__comercials');
    }
};
