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
        Schema::create('c_e_p_s', function (Blueprint $table) {
            $table->integer('cep');
            $table->string('pais');
            $table->string('estado');
            $table->string('cidade');
            $table->foreignId('endereco_id')->references('id')->on('enderecos')
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
        Schema::dropIfExists('c_e_p_s');
    }
};
