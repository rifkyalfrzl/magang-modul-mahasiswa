<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\MyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        // $jobs = Job::all();
        $jobs = Job::orderBy('tgl_batas_akhir','desc')->get();
        return view('pages.pendaftaran_magang')->with('jobs', $jobs);
    }

    public function showDetail($id)
    {
        $jobs = Job::where('id', $id)->first();
        return view('pages.detail_lowongan')->with('jobs', $jobs); 
    }
    public function applyJob(Request $request, $id)
    {
        // Ambil informasi pekerjaan dari tabel 'job_table'
        $job = Job::findOrFail($id);
    
        // Lakukan pengecekan apakah pengguna sudah mendaftar pada lowongan ini sebelumnya
        $user = Auth::user();
        $existingApplication = MyJob::where('username', $user->username)
                                      ->where('id_lowongan', $job->id)
                                      ->where('judul_lamaran', $job->judul)
                                      ->where('nama_perusahaan_lamaran', $job->nama_perusahaan)
                                      ->exists();
    
        if ($existingApplication) {
            return view('pages.apply_exists');
        }
    
        // Validasi apakah file CV diunggah
        if (!$request->hasFile('cv_file')) {
            return redirect()->back()->with('error', 'Mohon upload CV anda');
        }
    
        // Simpan data CV ke dalam tabel 'my_job_table'
        $cvFile = $request->file('cv_file');
        $fileName = $user->username . '_' . time() . '.' . $cvFile->getClientOriginalExtension();
        $cvFile->storeAs('cv_files', $fileName); // Menyimpan file CV di storage/app/cv_files
    
        // Membuat entri baru di tabel 'my_job_table' untuk pengguna yang sedang login
        MyJob::create([
            'username' => $user->username,
            'cv_file' => $fileName,
            'id_lowongan' => $job->id,
            'judul_lamaran' => $job->judul, 
            'nama_perusahaan_lamaran' => $job->nama_perusahaan,
        ]);
        return view('pages.after_apply');
    }
}