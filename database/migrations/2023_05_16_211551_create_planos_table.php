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
        Schema::create('planos', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default(Str::uuid());
            $table->string('tipo');
            $table->boolean("conf_pagamento");
            $table->dateTimeTz('startDate', $precision = 0);
            $table->dateTimeTz('paymentDate', $precision = 0);
            $table->foreignId("users_id")->references('id')->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planos');
    }
};