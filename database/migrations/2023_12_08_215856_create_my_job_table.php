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
        Schema::create('my_job_table', function (Blueprint $table) {
            $table->id();
            $table->string('username'); // Kolom untuk menyimpan username pengguna
            $table->string('cv_file'); // Kolom untuk menyimpan nama file CV
            $table->text('lamaran'); // Kolom untuk menyimpan informasi lamaran
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
        Schema::dropIfExists('my_job_table');
    }
};

