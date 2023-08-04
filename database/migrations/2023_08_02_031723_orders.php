<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kartu_id');
            $table->string('jenis_alat_uttp');
            $table->string('merek');
            $table->string('tipe_atau_model');
            $table->string('nomor_seri');
            $table->float('kapasitas');
            $table->float('skala');
            $table->float('hasil_skala');
            $table->string('kelas');
            $table->string('jenis_pengukuran');
            $table->string('jumlah_at')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('kartu_id')->references('id')->on('kartus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Orders');
    }
};

