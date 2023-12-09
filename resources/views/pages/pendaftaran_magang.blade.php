<!DOCTYPE html>
<html>
<head>
  <title>Header Tahap Pendaftaran Magang</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="pendaftaran-magang">
    <div class="header">
      <div class="header-title">
        TAHAP PENDAFTARAN MAGANG
      </div>
      <div class="navigation">
        <p>
          <a href="{{ url('/beranda') }}">Beranda</a> &gt;
          <a href="{{ url('/tahap-pendaftaran-magang') }}">Tahap Pendaftaran Magang</a> &gt; Pendaftaran Magang
        </p>
      </div>
    </div>
    <div class="content">
      <h2>TEMUKAN PERUSAHAAN MAGANG DAN JOBDESK SESUAI DENGAN KEAHLIAN KAMU</h2>
      <h3>{{ count($jobs) }} Job Founds</h3>
      <div class="job-boxes">
        @if ($jobs->isEmpty())
          <p>Tidak ada data</p>
        @else
          @foreach ($jobs as $job)
            <div class='job-box'>
              <img src='{{ $job->gambar }}' alt='Gambar Lowongan'>
              <div class='job-details-left'>
                <h4>{{ $job->judul }}</h4>
                <p>{{ $job->nama_perusahaan }}</p>
                <p>{{ $job->lokasi }}</p>
              </div>
              <div class='job-details-right'>
                <a href='{{ url('detail-lowongan/'.$job->id) }}' class='detail-button'>Detail</a>
                <p class='job-created'>Closed: {{ date("d-M-Y", strtotime($job->tgl_batas_akhir)) }}</p>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</body>
</html>