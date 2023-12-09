@extends('layout.aplikasi')

@section('content')
<div class="login-page">
   <div class="left-section">
       <img src="\modul_mahasiswa-2\login.svg" alt="Icon Login"/>
   </div>
   <div class="right-section">
      <div class="login-form">
         <h2>Ayo Masuk</h2>
         <form action="{{ route('login.post') }}" method="POST">
             @csrf
             <label for="username">Masukkan Username</label>
             <input type="text" id="username" name="username" placeholder="Username" required>

             <label for="password">Masukkan Password</label>
             <input type="password" id="password" name="password" placeholder="Password" required>
            
             @if(session('error'))
             <div class="error-message">
                 <p>{{ session('error') }}</p>
             </div>
         @endif
             <input type="submit" value="LOGIN">
         </form>
     </div>
   </div>
</div>
@endsection