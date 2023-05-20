<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = [
        'thumbnail_buku',
        'nama_buku',
        'pengarang',
        'penerbit',
        'tanggal_publikasi',
        'jumlah_halaman',
        'id_genre_buku',
        'stock',
        'harga',
    ];
    protected $table = 'buku';
    public $timestamps = true;

    protected $primaryKey = 'id_buku';

    public function callGenreBuku()
    {
        return $this->belongsTo(GenreBuku::class, 'id_genre_buku');
    }

    public function callRiwayatPembelian()
    {
        return $this->hasMany(RiwayatPembelian::class, 'id_buku');
    }

}
