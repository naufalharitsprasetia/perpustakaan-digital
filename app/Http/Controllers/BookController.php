<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function dashboard()
    {
        $books = Book::where('buku_is_deleted', false)->get();
        return view('dashboard', [
            'active' => 'dashboard',
            'books' => $books
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('buku_is_deleted', false)->get();
        return view('books', [
            'active' => 'books',
            'books' => $books
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
        $validatedData = $request->validate([
            'nama_buku' => 'required',
            'kelas_buku' => 'required',
            'nomer_rak_buku' => 'required',
            'isbn_buku' => 'required',
            'penulis_buku' => 'required',
            'penerbit_buku' => 'required',
            'urutan_buku' => 'nullable',
            'kode_buku' => 'nullable',
        ]);
        //
        $validatedData['id_buku'] = Str::uuid();
        // dd($validatedData);
        Book::create($validatedData);

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
        $validatedData = $request->validate([
            'nama_buku' => 'required',
            'kelas_buku' => 'required',
            'nomer_rak_buku' => 'required',
            'isbn_buku' => 'required',
            'penulis_buku' => 'required',
            'penerbit_buku' => 'required',
            'urutan_buku' => 'nullable',
            'kode_buku' => 'nullable',
        ]);
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
        Book::where('id_buku', $book->id_buku)->update($deleted_is_true);
        return redirect('/dashboard')->with('success', 'Data Buku telah di hapus!');
    }
}