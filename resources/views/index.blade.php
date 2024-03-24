@extends('layout.main')

@section('css')
    {{-- <link rel="stylesheet" href="/css/contoh.css"> --}}
@endsection

@section('content')
    <h1>Selamat Datang di Perpustakaan MI PSM Sidorejo !</h1>
    <hr>
    <div class="container-fluid text-center">
        <div class="title-content d-flex justify-content-center align-items-center">
            <img src="/assets/logo.png" width="200" class="logo-visi-mis" alt="">
            <h2 class="text-decoration-underline">VISI MISI MI PSM SIDOREJO</h2>
        </div>
        <br>
        {{-- Visi Misi --}}
        <div class="visi-misi-container d-flex p-3" style="background-color: bisque">
            <div class="visi">
                <span class="fw-bold">VISI</span>
                <p>Terwujudnya Generasi Yang Berprestasi Dalam Imtaq, Iptek Dan Berbudaya Lingkungan</p>
                <br>
            </div>
            <div class="misi">
                <span class="fw-bold">MISI</span>
                <p>
                <ul class="list-misi" style="list-style-type: none">
                    <li>
                        - Meningkatkan Pembinaan dan bimbingan keagamaan sehingga terbentuk anak didik yang sholeh sholehah
                    </li>
                    <li>
                        - Membiasakan perilaku hidup sesuai akhlakul karimah
                    </li>
                    <li>
                        - Meningkatkan efektifitas pembelajaran sesuai kurikulum
                    </li>
                    <li>
                        - Meningkatkan pembelajaran ekstrakurikuler
                    </li>
                    <li>
                        - Menciptakan lingkungan Madrasah yang aman, sehat, bersih dan Indah sebagai wujud pelestarian
                        terhadap
                        lingkungan.
                    </li>
                </ul>
                </p>
            </div>
        </div>
        {{-- Foto  --}}
        <br><br>
        <div class="galeri-foto pb-5 mx-2" style="background-color: bisque">
            <h3 class="text-center pt-3">Galeri Perpustakaan</h3>
            <div class="galeri-perpustakaan d-flex justify-content-center gap-4">
                <img src="/assets/dalam.jpeg" width="500" alt="">
                <img src="/assets/luar.jpeg" width="500" alt="">
            </div>
        </div>
        <br><br>
        {{-- End Foto --}}
    </div>
@endsection
