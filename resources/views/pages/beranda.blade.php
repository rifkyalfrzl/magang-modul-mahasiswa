@extends('layout.aplikasi')

@section('content')
<div class="modul-mahasiswa-container">
   <img class="undraw-working-re" src="modul_mahasiswa\modul mahasiswa - 1\gambar - A.svg" />
   <div class="label"><div class="text-wrapper">MAGANG UMUM INFORMATIKA</div></div>
   <div class="box-container">
       <a href="/tahap-pendaftaran-magang"> <!-- Tautan ke halaman tahap pendaftaran -->
           <div class="box">
               <div class="box-content">
                   <p>Tahap Pendaftaran Magang</p>
                   <img src="modul_mahasiswa\modul mahasiswa - 1\logo 1 - A.png">
                   <span>Tahap pendaftaran magang merupakan
                       tahap awal yang di lakukan
                       mahasiswa</span>
               </div>
           </div>
       </a>
       <a href="/tahap-persiapan-magang"> <!-- Tautan ke halaman tahap persiapan -->
           <div class="box">
               <div class="box-content">
                   <p>Tahap Persiapan Magang</p>
                   <img src="modul_mahasiswa\modul mahasiswa - 1\logo 2 - A.png">
                   <span>Tahap persiapan magang merupakan
                       tahap untuk melengkapi
                       dokumen magang</span>
               </div>
           </div>
       </a>
       <a href="/tahap-pelaksanaan-magang"> <!-- Tautan ke halaman tahap pelaksanaan -->
           <div class="box">
               <div class="box-content">
                   <p>Tahap Pelaksanaan Magang</p>
                   <img src="modul_mahasiswa\modul mahasiswa - 1\logo 3 - A.png">
                   <span>Tahap pelaksanaan magang merupakan
                       tahap aktivitas yang di lakukan 
                       oleh mahasiswa</span>
               </div>
           </div>
       </a>
   </div>
</div>
@endsection