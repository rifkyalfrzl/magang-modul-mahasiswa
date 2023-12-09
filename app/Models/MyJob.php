<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyJob extends Model
{
    protected $table = 'my_job_table';

    protected $fillable = [
        'username',
        'cv_file',
        'id_lowongan',
        'judul_lamaran',
        'nama_perusahaan_lamaran'
    ];
}
