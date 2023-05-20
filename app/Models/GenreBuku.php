<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreBuku extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_genre_buku',
    ];
    protected $table = 'genre_buku';
    public $timestamps = false;

    protected $primaryKey = 'id_genre_buku';

    public function callBuku()
    {
        return $this->hasMany(Buku::class, 'id_genre_buku');
    }

}
