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
        Schema::create('hasil_pengujians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');

            // Standar values
            $table->decimal('zero', 8, 2)->nullable();
            $table->decimal('minimum', 8, 2)->nullable();
            $table->decimal('bkd1', 8, 2)->nullable();
            $table->decimal('bkd2', 8, 2)->nullable();
            $table->decimal('bkd3', 8, 2)->nullable();

            // Penunjukan values
            $table->decimal('penunjukanzero', 8, 2)->nullable();
            $table->decimal('penunjukanminimum', 8, 2)->nullable();
            $table->decimal('penunjukanbkd1', 8, 2)->nullable();
            $table->decimal('penunjukanbkd2', 8, 2)->nullable();
            $table->decimal('penunjukanbkd3', 8, 2)->nullable();

            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
