@extends('layout.main')

@section('css')
    {{-- <link rel="stylesheet" href="/css/contoh.css"> --}}
@endsection

@section('content')
    <h1>Detail Buku</h1><br>
    <a href="/books" class="btn btn-primary">Kembali</a>
    @auth
        <a href="/dashboard" class="btn btn-primary">Kembali ke Dashboard</a>
    @endauth
    <hr>
    <div class="d-flex gap-3 mx-4 justify-content-center">
        <div>
            <img src="/assets/buku/{{ $book->gambar_buku }}" width="300" alt="">
            @auth
                <h4>Gambar Buku : {{ $book->gambar_buku }}</h4>
            @endauth
        </div>
        <div>
            <h4>Nama Buku : {{ $book->nama_buku }}</h4>
            <h4>Nomer Rak Buku : {{ $book->nomer_rak_buku }}</h4>
            <h4>Kelas Buku : {{ $book->kelas_buku }}</h4>
            <h4>ISBN Buku : {{ $book->isbn_buku }}</h4>
            <h4>Penerbit Buku : {{ $book->penerbit_buku }}</h4>
            <h4>Penulis Buku : {{ $book->penulis_buku }}</h4>
            <h4>Urutan Buku : {{ $book->urutan_buku }}</h4>
            <h4>Kode Buku : {{ $book->kode_buku }}</h4>
        </div>
    </div>
@endsection
