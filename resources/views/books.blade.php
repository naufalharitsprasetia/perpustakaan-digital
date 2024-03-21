@extends('layout.main')

@section('css')
    {{-- <link rel="stylesheet" href="/css/contoh.css"> --}}
@endsection

@section('content')
    <h1>Buku-Buku</h1>
    <hr>
    <br>
    <div class="row d-flex justify-content-around gap-2">
        @foreach ($books as $book)
            {{-- Card Buku --}}
            <div class="card mb-3 col-2 px-0">
                <img src="/assets/buku/{{ $book->gambar_buku }}" class="card-img-top" alt="..." width="100">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->nama_buku }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Kelas : {{ $book->kelas_buku }} | Nomer Rak :
                        {{ $book->nomer_rak_buku }}</h6>
                    <p class="card-text mb-0"><small class="text-body-secondary">Penerbit :
                            {{ $book->penerbit_buku }}</small>
                    </p>
                    <p class="card-text mb-0"><small class="text-body-secondary">Penulis : {{ $book->penulis_buku }}</small>
                    </p>
                    <p class="card-text mb-2"><small class="text-body-secondary">ISBN : {{ $book->isbn_buku }}</small></p>
                    <a href="/detail-buku/{{ $book->id_buku }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
            {{-- End --}}
        @endforeach
    </div>
@endsection
