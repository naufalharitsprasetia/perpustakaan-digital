@extends('layout.main')

@section('css')
    {{-- <link rel="stylesheet" href="/css/contoh.css"> --}}
@endsection

@section('content')
    <h1>Dashboard</h1>
    <span>Tanggal | Waktu : {{ $sekarang }}</span><br><br>
    <a href="/tambah-buku" class="btn btn-primary">Tambahkan Data buku</a>
    <br>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/dashboard">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search...." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <hr>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Buku</th>
                <th scope="col">Kelas Buku</th>
                <th scope="col">No Rak Buku</th>
                <th scope="col">ISBN Buku</th>
                <th scope="col">Penulis Buku</th>
                <th scope="col">Penerbit Buku</th>
                <th scope="col">Urutan Buku</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $book->nama_buku }}</td>
                    <td>{{ $book->kelas_buku }}</td>
                    <td>{{ $book->nomer_rak_buku }}</td>
                    <td>{{ $book->isbn_buku }}</td>
                    <td>{{ $book->penulis_buku }}</td>
                    <td>{{ $book->penerbit_buku }}</td>
                    <td>{{ $book->urutan_buku }}</td>
                    <td>{{ $book->kode_buku }}</td>
                    <td>
                        <a href="/detail-buku/{{ $book->id_buku }}" class="badge bg-info "><i
                                class="bi bi-eye"></i>Detail</a>
                        <a href="/edit-buku/{{ $book->id_buku }}" class="badge bg-warning "><i class="bi bi-pencil"></i>
                            Edit</a>
                        <form action="/hapus-buku/{{ $book->id_buku }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you Sure?')"><i
                                    class="bi bi-x-circle"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
