<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $jobsData = [
        [
            'gambar' => '\jobs\pt-fastrata.jpeg',
            'judul' => 'Mobile Apps Programmer Intern',
            'nama_perusahaan' => 'PT Fastrata',
            'lokasi' => 'Jakarta',
            'job_tipe' => 'Part Time',
            'salary' => 4000000,
            'tgl_batas_akhir' => '2023-02-20',
            'info_nama_perusahaan' => 'PT Fastrata Indonesia',
            'situs_web' => 'Fastrata.com',
            'email' => 'Fastrata@gmail.com',
            'job_desc' => json_encode([
                'Melakukan coding sesuai dengan desain software E-Retail yang telah di tetapkan dan sesuai dengan platform IOS & Android yang telah ditentukan.',
                'Melakukan uji coba dan melakukan kontrol terhadap program aplikasi E-Retail',
            ]),
            'required_skill' => json_encode([
                'Memiliki pengetahuan dasar yang kuat di Mobile Apps (Android dan iOS) tech',
                'Paham dan menguasai pengembangan Mobile Apps (Kotlin, Java Native, React Native & Swift)',
                'Terbiasa dengan metode development Scrum , Agile',
                'Memiliki pengalaman selama minimal 5 tahun dalam pengembangan API (JSON), menggunakan PHP lebih disukai',
                'Terbiasa dengan pengembangan kolaborasi (SVN, GIT dan sejenisnya)',
            ]),
            'created_at' => now(),
        ],
    ];

    foreach ($jobsData as $job) {
        DB::table('job_table')->insert($job);
    }
}

}
