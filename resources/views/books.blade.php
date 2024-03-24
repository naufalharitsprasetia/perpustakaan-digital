@extends('layout.main')

@section('css')
    {{-- <link rel="stylesheet" href="/css/contoh.css"> --}}
@endsection

@section('content')
    <h1>Buku-Buku</h1>
    <hr>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="" method="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search ..." name="searchBuku"
                        value="{{ request('searchBuku') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="row book-container d-flex justify-content-around gap-2">
        @foreach ($books as $book)
            {{-- Card Buku --}}
            <div class="card book-card mb-3 col-2 px-0">
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
        {{-- Pagination --}}
        <div class="row g-0 text-center align-items-center mb-3 mt-4">
            <div class="col-lg-12">
                <ul class="pagination pagination-separated justify-content-center">
                    {{ $books->links() }}
                </ul>
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
@endsection
