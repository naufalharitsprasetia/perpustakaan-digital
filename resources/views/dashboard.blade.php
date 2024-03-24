@extends('layout.main')

@section('css')
    {{-- <link rel="stylesheet" href="/css/contoh.css"> --}}
@endsection

@section('content')
    <h1>Dashboard</h1>
    <span class="fw-bold"><u>Jumlah buku yang terdata</u> : <span
            class="btn btn-warning fw-bold">{{ $totalBuku }}</span></span><br><br>
    <span>Tanggal | Waktu : {{ $sekarang }}</span><br><br>
    <a href="/tambah-buku" class="btn btn-primary">Tambahkan Data buku</a>
    <br>
    {{-- <div class="row justify-content-center mb-3 pt-3">
        <div class="container search-contain">
            <form class="row g-3" action="/dashboard">
                <h3>Form Filter/Search</h3>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">State</label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div> --}}
    <hr>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <form action="{{ route('dashboard') }}" method="GET">
        <label for="perPage">Tampilkan per Halaman:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="5" {{ Request::get('perPage') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ Request::get('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="15" {{ Request::get('perPage') == 15 ? 'selected' : '' }}>15</option>
            <option value="20" {{ Request::get('perPage') == 20 ? 'selected' : '' }}>20</option>
        </select>
    </form>
    <br>
    <div class="overflow-auto">
        <table class="table table-success table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center" colspan="10">DATA DATA BUKU PERPUSTAKAAN</th>
                </tr>
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
                <tr>
                    <form action="" method="">
                        <th scope="col"><i class="bi bi-search"></i></th>
                        <th scope="col">
                            <input type="text" name="namaBuku" value="{{ request('namaBuku') }}" style="width: 7rem;">
                        </th>
                        <th scope="col">
                            <input type="text" name="kelasBuku" value="{{ request('kelasBuku') }}" style="width: 3rem;">
                        </th>
                        <th scope="col">
                            <input type="text" name="noRakBuku" value="{{ request('noRakBuku') }}" style="width: 4rem;">
                        </th>
                        <th scope="col">
                            <input type="text" name="isbnBuku" value="{{ request('isbnBuku') }}" style="width: 8rem;">
                        </th>
                        <th scope="col">
                            <input type="text" name="penulisBuku" value="{{ request('penulisBuku') }}">
                        </th>
                        <th scope="col">
                            <input type="text" name="penerbitBuku" value="{{ request('penerbitBuku') }}"
                                style="width: 7rem;">
                        </th>
                        <th scope="col">
                            <input type="text" name="urutanBuku" value="{{ request('urutanBuku') }}"
                                style="width: 3rem;">
                        </th>
                        <th scope="col">
                            <input type="text" name="kodeBuku" value="{{ request('kodeBuku') }}" style="width: 4rem;">
                        </th>
                        <th scope="col">
                            <button type="submit" class="btn btn-success" name="submitSearch">Search</button>
                        </th>
                    </form>
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
                            <a href="/edit-buku/{{ $book->id_buku }}" class="badge bg-warning "><i
                                    class="bi bi-pencil"></i>
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
        <div class="row g-0 text-center align-items-center mb-3 mt-4">
            <div class="col-lg-12">
                <ul class="pagination pagination-separated justify-content-center">
                    {{ $books->links() }}
                </ul>
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
@endsection
