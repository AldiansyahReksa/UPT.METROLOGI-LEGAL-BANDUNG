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
        Schema::create('kartu_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kartu_id');
            $table->timestamps();
            
            $table->foreign('kartu_id')->references('id')->on('kartus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
