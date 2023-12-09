<!DOCTYPE html>
<html>
<head>
  <title>DAFTAR LAMARAN</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="pendaftaran-magang">
    <div class="header">
      <div class="header-title">
        DAFTAR LAMARAN
      </div>
      <div class="navigation">
        <p>
          <a href="{{ url('/beranda') }}">Beranda</a> &gt; Daftar Lamaran
        </p>
      </div>
    </div>
    <div class="content">
      <h3>{{ count($apply) }} Lamaran</h3>
      <div class="job-boxes">
        @if ($apply->isEmpty())
          <p> </p>
        @else
          @foreach ($apply as $apply)
            <div class='job-box'>
              <div class='job-details-left'>
                  <h4>{{ $apply->judul_lamaran }}</h4>
                  <p>{{ $apply->nama_perusahaan_lamaran }}</p>
              </div>
              <div class='job-details-right'>
                <a href='{{ url('detail-lowongan/'.$apply->id_lowongan) }}' class='detail-button'>Detail</a>
                <p class='job-created'>Daftar pada: {{ date("d M Y", strtotime($apply->created_at)) }}</p>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</body>
</html>
