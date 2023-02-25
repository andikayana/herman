<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienVisitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien_visitation', function (Blueprint $table) {
            $table->id();
            $table->string('pasien_id');
            $table->string('visit_id')->unique();
            $table->dateTime('tanggal_kunjungan');
            $table->string('sistolik')->nullable();
            $table->string('diastolik')->nullable();
            $table->string('suhu')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('rencana_kerja')->nullable();
            $table->string('diagnosa')->nullable();
            $table->integer('dokter_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien_visitation');
    }
}
