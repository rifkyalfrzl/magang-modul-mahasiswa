<!DOCTYPE html>
<html>
<head>
  <title>Detail Lowongan Pekerjaan</title>
  <!-- Link ke CSS Anda -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script>
   function goBack() {
     window.history.back();
   }

   function showFileName(event) {
        var input = event.target;
        var fileNameDisplay = document.getElementById('file-name');
        var allowedExtensions = /(\.pdf)$/i; // Hanya izinkan ekstensi .pdf

        if (!allowedExtensions.exec(input.value)) {
            input.value = ''; // Kosongkan nilai input jika bukan PDF
            fileNameDisplay.textContent = 'Gagal. CV harus dalam bentuk PDF'; // Tampilkan pesan kesalahan
            document.getElementById('apply-button').disabled = true; // Menonaktifkan tombol "Apply"
        } else {
            fileNameDisplay.textContent = input.files[0].name; // Tampilkan nama file jika sesuai format
            document.getElementById('apply-button').disabled = false; // Mengaktifkan tombol "Apply"
        }
    }
 </script>
</head>
<body>
   <div class="back-button">
      <a href="javascript:void(0);" onclick="goBack();">
         <img src="\modul_mahasiswa-2\left-arrow.png" alt="back button">
      </a>
   </div>
  <div class="detail-page">
   <div class="header-detail">
      <div class="header-section">
         <img src="{{ $jobs->gambar }}" alt="Logo Perusahaan">
         <div class="job-info">
            <h2>{{ $jobs->judul }}</h2>
            <p>{{ $jobs->nama_perusahaan }}</p>
            <p>{{ $jobs->lokasi }}</p>
         </div>
      </div>
      
      <div class="job-apply-button">
         <div class="apply-button-section">
            <form action="{{ route('apply.job', ['id' => $jobs->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="cv-upload" class="upload-cv-button">Upload CV</label>
                    <input id="cv-upload" name="cv_file" type="file" style="display:none" onchange="showFileName(event)">
                    <button type="submit" id="apply-button" class="apply-button" disabled>Apply</button>
                </form>
         </div>
         <div id="file-name"></div>
      </div>
   </div>
      <div class="info-boxes">
         <div class="info-box">
            <h3>Job Overview</h3>
            <div class="info-box-left">
               <div class="box-left-section">
                  <p>Posted Date : {{ date('d M Y', strtotime($jobs->created_at)) }}</p>
                  <p>Location : {{ $jobs->lokasi }}</p>
                  <p>Job Nature : {{ $jobs->job_tipe }}</p>
               </div>
               <div class="box-right-section">
                  <p>Salary : Rp. {{ number_format($jobs->salary, 0, ',', '.') }}</p>
                  <p>Batas Akhir : {{ date('d M Y', strtotime($jobs->tgl_batas_akhir)) }}</p>
               </div>
            </div>
         </div>
         <div class="info-box-right">
            <h3>Company Information</h3>
            <div class="company-box">
               <p>Name : {{ $jobs->info_nama_perusahaan }}</p>
               <p>Web : {{ $jobs->situs_web }}</p>
               <p>Email : {{ $jobs->email }}</p>
            </div>
         </div>
      </div>
      <div class="job-desc">
         <h3>Job Description</h3>
         <ul>
            @foreach($jobs->job_desc as $desc)
                <li>{{ $desc }}</li>
            @endforeach
        </ul>
      </div>
      <div class="req-skill">
         <h3>Required Knowledge, Skills, and Abilities</h3>
         <ul>
            @foreach($jobs->required_skill as $skill)
              <li>{{ $skill }}</li>
            @endforeach
         </ul>
      </div>
  </div>
</body>
</html>
