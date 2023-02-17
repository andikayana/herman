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
            $table->string('sistolik');
            $table->string('diastolik');
            $table->string('suhu');
            $table->string('keluhan');
            $table->string('rencana_kerja');
            $table->string('diagnosa');
            $table->integer('dokter_id');
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
