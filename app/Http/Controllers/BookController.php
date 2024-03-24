<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function dashboard(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Mengambil nilai perPage dari permintaan pengguna, default ke 10 jika tidak ada yang disediakan
        $perPage = $request->input('perPage', 5);

        $books = Book::where('buku_is_deleted', false)
            ->when(
                request('namaBuku'),
                function ($query, $namaBuku) {
                    $query->where('nama_buku', 'like', '%' . $namaBuku . '%');
                    return $query;
                }
            )
            ->when(
                request('kelasBuku'),
                function ($query, $kelasBuku) {
                    $query->where('kelas_buku', 'like', '%' . $kelasBuku . '%');
                    return $query;
                }
            )
            ->when(
                request('noRakBuku'),
                function ($query, $noRakBuku) {
                    $query->where('nomer_rak_buku', 'like', '%' . $noRakBuku . '%');
                    return $query;
                }
            )
            ->when(
                request('isbnBuku'),
                function ($query, $isbnBuku) {
                    $query->where('isbn_buku', 'like', '%' . $isbnBuku . '%');
                    return $query;
                }
            )
            ->when(
                request('penulisBuku'),
                function ($query, $penulisBuku) {
                    $query->where('penulis_buku', 'like', '%' . $penulisBuku . '%');
                    return $query;
                }
            )
            ->when(
                request('penerbitBuku'),
                function ($query, $penerbitBuku) {
                    $query->where('penerbit_buku', 'like', '%' . $penerbitBuku . '%');
                    return $query;
                }
            )
            ->when(
                request('urutanBuku'),
                function ($query, $urutanBuku) {
                    $query->where('urutan_buku', 'like', '%' . $urutanBuku . '%');
                    return $query;
                }
            )
            ->when(
                request('kodeBuku'),
                function ($query, $kodeBuku) {
                    $query->where('kode_buku', 'like', '%' . $kodeBuku . '%');
                    return $query;
                }
            )
            ->paginate($perPage)
            ->withQueryString();
        $totalBuku = count(Book::where('buku_is_deleted', false)->get());
        return view('dashboard', [
            'active' => 'dashboard',
            'books' => $books,
            'sekarang' => now(),
            'totalBuku' => $totalBuku
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('buku_is_deleted', false)
            ->when(
                request('searchBuku'),
                function ($query, $searchBuku) {
                    $query->where('nama_buku', 'like', '%' . $searchBuku . '%')
                        ->orWhere('kelas_buku', 'like', '%' . $searchBuku . '%')
                        ->orWhere('nomer_rak_buku', 'like', '%' . $searchBuku . '%')
                        ->orWhere('isbn_buku', 'like', '%' . $searchBuku . '%')
                        ->orWhere('penerbit_buku', 'like', '%' . $searchBuku . '%')
                        ->orWhere('penulis_buku', 'like', '%' . $searchBuku . '%')
                        ->orWhere('urutan_buku', 'like', '%' . $searchBuku . '%')
                        ->orWhere('kode_buku', 'like', '%' . $searchBuku . '%')
                        ->paginate(10)
                        ->withQueryString();
                    return $query;
                }
            )
            ->paginate(10)
            ->withQueryString();;
        return view('books', [
            'active' => 'books',
            'books' => $books,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah-buku', [
            'active' => 'dashboard',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        date_default_timezone_set('Asia/Jakarta');
        $validatedData = $request->validate(
            [
                'gambar_buku' => 'image|file|max:1024',
                'nama_buku' => 'required',
                'kelas_buku' => 'required',
                'nomer_rak_buku' => 'required',
                'isbn_buku' => 'required',
                'penulis_buku' => 'required',
                'penerbit_buku' => 'required',
                'urutan_buku' => 'nullable',
                'kode_buku' => 'nullable',
            ],
            [
                'gambar_buku.image' => 'Gambar Program harus berupa gambar',
                'gambar_buku.file' => 'Gambar Program harus berupa file',
                'gambar_buku.max' => 'Gambar Program tidak boleh lebih dari 1MB',
            ]
        );
        //
        $validatedData['id_buku'] = Str::uuid();
        // dd($validatedData);
        $file = $request->file('gambar_buku');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'assets/buku';
        $file->move($tujuan_upload, $nama_file);
        $validatedData['gambar_buku'] = $nama_file;
        // dd($validatedData);
        // Book::create($validatedData);
        DB::table('books')->insert($validatedData);

        // Ambil data log terbaru berdasarkan log_created_at
        // $latestLog = Log::latest('log_created_at')->first();
        // Lakukan sesuatu dengan $latestLog, misalnya:
        // $logData = auth()->user()->username;
        // Update data log
        // Pastikan menyesuaikan kolom dan nilai yang ingin diupdate
        // Log::where('log_created_at', $latestLog->log_created_at)->update([
        //     'log_username' => $logData,
        //     // Kolom dan nilai lainnya yang ingin diupdate
        // ]);
        return redirect('/dashboard')->with('success', 'Data Buku baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return view('detail-buku', [
            'active' => 'books',
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        return view('edit-buku', [
            'active' => 'dashboard',
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        date_default_timezone_set('Asia/Jakarta');
        $validatedData = $request->validate([
            'gambar_buku' => 'image|file|max:1024',
            'nama_buku' => 'required',
            'kelas_buku' => 'required',
            'nomer_rak_buku' => 'required',
            'isbn_buku' => 'required',
            'penulis_buku' => 'required',
            'penerbit_buku' => 'required',
            'urutan_buku' => 'nullable',
            'kode_buku' => 'nullable',
        ]);
        if ($request->hasFile('gambar_buku')) {
            $file = $request->file('gambar_buku');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'assets/buku';
            $file->move($tujuan_upload, $nama_file);
            $validatedData['gambar_buku'] = $nama_file;
            // hapus Data gambar lama
            if ($book->gambar_buku != "default.png") {
                unlink('assets/buku/' . $book->gambar_buku);
            }
        }
        Book::where('id_buku', $book->id_buku)->update($validatedData);
        return redirect('/dashboard')->with('success', 'Data Buku telah di perbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $deleted_is_true['buku_is_deleted'] = true;
        // hapus Data gambar 
        if ($book->gambar_buku != "default.png") {
            unlink('assets/buku/' . $book->gambar_buku);
        }

        Book::where('id_buku', $book->id_buku)->update($deleted_is_true);
        return redirect('/dashboard')->with('success', 'Data Buku telah di hapus!');
    }
}
