<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    // protected $guarded = ['id_buku'];
    protected $fillable = [
        'id_buku',
        'nama_buku',
        'nomer_rak_buku',
        'kelas_buku',
        'isbn_buku',
        'penulis_buku',
        'penerbit_buku',
        'urutan_buku',
        'kode_buku',
    ];

    protected $primaryKey = 'id_buku';
    protected $keyType = 'string'; // Atur tipe data primary key sebagai string
    public $incrementing = false; // Nonaktifkan incrementing ID
    // public $timestamps = false; // Menonaktifkan fitur timestamps

    // public function detailTransaksis()
    // {
    //     return $this->hasMany(DetailTransaksi::class, 'detail_transaksi_barang_id', 'barang_id');
    // }
}
