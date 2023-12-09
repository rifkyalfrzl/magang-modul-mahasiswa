<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_table';

    protected $fillable = [
        'gambar',
        'judul',
        'nama_perusahaan',
        'lokasi',
        'job_tipe',
        'salary',
        'tgl_batas_akhir',
        'info_nama_perusahaan',
        'situs_web',
        'email',
        'job_desc',
        'required_skill',
    ];

    protected $casts = [
        'job_desc' => 'array',
        'required_skill' => 'array',
    ];
}
