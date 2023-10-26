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
        Schema::create('horario_comercials', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default(Str::uuid());
            $table->string('dom')->nullable();
            $table->string('seg')->nullable();
            $table->string('ter')->nullable();
            $table->string('qua')->nullable();
            $table->string('qui')->nullable();
            $table->string('sex')->nullable();
            $table->string('sab')->nullable();
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
