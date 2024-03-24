@extends('layout.main')

@section('css')
    {{-- <link rel="stylesheet" href="/css/contoh.css"> --}}
@endsection

@section('content')
    <h1>Tambah Buku</h1>
    <a href="/dashboard" class="btn btn-primary">Kembali</a>
    <hr>
    <form action="/tambah-buku" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
        <h2>Form Penambahan buku</h2>
        <span class="badge text-bg-warning my-2">NB : tanda (*) = wajib di isi</span>
        <div class="mb-3">
            <img class="img-preview mb-3" width="200">
            <input class="form-control @error('gambar_buku') is-invalid @enderror" type="file" id="image"
                name="gambar_buku" onchange="previewImage()">
            <label for="image" class="form-label">Masukkan Gambar Cover buku (Max-size : 1mb / 1024kb) - kalau bisa
                potrait - lebar 240px -
                tinggi 320px - rasio aspek 3:4 - (**boleh kosong)</label><br>
            <span>- kalau kebesaran filenya silahkan dikecilkan / kompress dulu gambar nya , <a
                    href="https://www.iloveimg.com/compress-image/compress-jpg" target="_blank">Website untuk
                    Kompres/memperkecil Gambar</a></span>
            @error('gambar_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('nama_buku') is-invalid @enderror" id="nama_buku"
                name="nama_buku" value="{{ old('nama_buku') }}" placeholder="Nama Buku" required>
            <label for="nama_buku">*Nama buku</label>
            @error('nama_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('nomer_rak_buku') is-invalid @enderror" id="nomer_rak_buku"
                name="nomer_rak_buku" value="{{ old('nomer_rak_buku') }}" placeholder="Nomer Rak Buku" required>
            <label for="nomer_rak_buku">*Nomer Rak Buku</label>
            @error('nomer_rak_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('kelas_buku') is-invalid @enderror" id="kelas_buku"
                name="kelas_buku" value="{{ old('kelas_buku') }}" placeholder="Kelas Buku" required>
            <label for="kelas_buku">*Kelas Buku</label>
            @error('kelas_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('isbn_buku') is-invalid @enderror" id="isbn_buku"
                name="isbn_buku" value="{{ old('isbn_buku') }}" placeholder="ISBN Buku" required>
            <label for="isbn_buku">*ISBN Buku</label>
            @error('isbn_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('penulis_buku') is-invalid @enderror" id="penulis_buku"
                name="penulis_buku" value="{{ old('penulis_buku') }}" placeholder="Penulis Buku" required>
            <label for="penulis_buku">*Penulis buku</label>
            @error('penulis_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('penerbit_buku') is-invalid @enderror" id="penerbit_buku"
                name="penerbit_buku" value="{{ old('penerbit_buku') }}" placeholder="Penerbit Buku" required>
            <label for="penerbit_buku">*Penerbit Buku</label>
            @error('penerbit_buku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('kode_buku') is-invalid @enderror" id="kode_buku"
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
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
