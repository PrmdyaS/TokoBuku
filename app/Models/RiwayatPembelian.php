<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPembelian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_buku',
        'harga_buku',
        'jumlah',
        'total_harga',
        'tanggal_pembelian',
    ];
    protected $table = 'riwayat_pembelian';
    public $timestamps = true;

    protected $primaryKey = 'id_riwayat_pembelian';

    public function callBuku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function callUser()
    {
        return $this->belongsTo(User::class, 'id');
    }

}
