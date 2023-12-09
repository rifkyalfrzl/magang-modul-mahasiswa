<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
{
    public function up()
    {
        Schema::create('job_table', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('judul');
            $table->string('nama_perusahaan');
            $table->string('lokasi');
            $table->string('job_tipe');
            $table->decimal('salary', 10, 2);
            $table->date('tgl_batas_akhir');
            $table->text('info_nama_perusahaan');
            $table->string('situs_web')->nullable();
            $table->string('email');
            $table->text('job_desc');
            $table->text('required_skill');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_table');
    }
}
