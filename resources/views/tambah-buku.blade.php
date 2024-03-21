@extends('layout.main')

@section('css')
    {{-- <link rel="stylesheet" href="/css/contoh.css"> --}}
@endsection

@section('content')
    <h1>Tambah Buku</h1>
    <a href="/dashboard" class="btn btn-primary">Kembali</a>
    <hr>
    <form action="/tambah-buku" method="post" class="mt-4">
        @csrf
        <h2>Form Penambahan buku</h2>
        <span class="badge text-bg-warning my-2">NB : tanda (*) = wajib di isi</span>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('nama_buku') is-invalid @enderror" id="nama_buku" name="nama_buku"
                value="{{ old('nama_buku') }}" placeholder="Nama Buku">
            <label for="nama_buku">*Nama buku</label>
            @error('nama_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('nomer_rak_buku') is-invalid @enderror" id="nomer_rak_buku"
                name="nomer_rak_buku" value="{{ old('nomer_rak_buku') }}" placeholder="Nomer Rak Buku">
            <label for="nomer_rak_buku">*Nomer Rak Buku</label>
            @error('nomer_rak_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('kelas_buku') is-invalid @enderror" id="kelas_buku"
                name="kelas_buku" value="{{ old('kelas_buku') }}" placeholder="Kelas Buku">
            <label for="kelas_buku">*Kelas Buku</label>
            @error('kelas_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('isbn_buku') is-invalid @enderror" id="isbn_buku"
                name="isbn_buku" value="{{ old('isbn_buku') }}" placeholder="ISBN Buku">
            <label for="isbn_buku">*ISBN Buku</label>
            @error('isbn_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('penulis_buku') is-invalid @enderror" id="penulis_buku"
                name="penulis_buku" value="{{ old('penulis_buku') }}" placeholder="Penulis Buku">
            <label for="penulis_buku">*Penulis buku</label>
            @error('penulis_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('penerbit_buku') is-invalid @enderror" id="penerbit_buku"
                name="penerbit_buku" value="{{ old('penerbit_buku') }}" placeholder="Penerbit Buku">
            <label for="penerbit_buku">*Penerbit Buku</label>
            @error('penerbit_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control @error('kode_buku') is-invalid @enderror" id="kode_buku"
                name="kode_buku" value="{{ old('kode_buku') }}" placeholder="Kode Buku">
            <label for="kode_buku">Kode Buku</label>
            @error('kode_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('urutan_buku') is-invalid @enderror" id="urutan_buku"
                name="urutan_buku" value="{{ old('urutan_buku') }}" placeholder="Urutan Buku">
            <label for="urutan_buku">Urutan Buku</label>
            @error('urutan_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
