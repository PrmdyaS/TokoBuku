<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\GenreBuku;
use App\Models\RiwayatPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::get();
        return view('pages.Buku.buku', compact('buku'));
    }

    public function tambah()
    {
        $GenreBuku = GenreBuku::get();
        return view('pages.Buku.buku-tambah', compact('GenreBuku'));
    }

    public function add(Request $request)
    {
        $attributes = $request->validate([
            'nama_buku' => ['required', 'max:255', 'min:2'],
            'pengarang' => ['required', 'max:255', 'min:2'],
            'penerbit' => ['required', 'max:255', 'min:2'],
            'tanggal_publikasi' => ['required'],
            'jumlah_halaman' => ['required', 'max:10'],
            'id_genre_buku' => ['required'],
            'stock' => ['required', 'max:10'],
            'harga' => ['required', 'max:10'],
            'foto' => ['mimes:jpg,png,jpeg', 'image'],
        ]);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('thumbnailBuku/', time() . '-' . $request->nama_buku . '.' . $request->file('foto')->getClientOriginalExtension());
            $buku = [
                'thumbnail_buku' => time() . '-' . $request->nama_buku . '.' . $request->file('foto')->getClientOriginalExtension(),
                'nama_buku' => $request->nama_buku,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'tanggal_publikasi' => $request->tanggal_publikasi,
                'jumlah_halaman' => $request->jumlah_halaman,
                'id_genre_buku' => $request->id_genre_buku,
                'stock' => $request->stock,
                'harga' => $request->harga,
            ];
            Buku::create($buku);
        } else {
            Buku::create($attributes);
        }
        return redirect()->route('buku')->with('success', 'Tambah Buku Sukses');
    }

    public function edit($id)
    {
        $GenreBuku = GenreBuku::get();
        $buku = Buku::where('id_buku', $id)->first();
        return view('pages.Buku.buku-edit', compact('buku', 'GenreBuku'));
    }

    public function detail($id)
    {
        $buku = Buku::where('id_buku', $id)->first();
        return view('pages.Buku.buku-detail', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::where('id_buku', $id)->first();
        $request->validate([
            'nama_buku' => ['required', 'max:255', 'min:2'],
            'pengarang' => ['required', 'max:255', 'min:2'],
            'penerbit' => ['required', 'max:255', 'min:2'],
            'tanggal_publikasi' => ['required'],
            'jumlah_halaman' => ['required', 'max:10'],
            'id_genre_buku' => ['required'],
            'stock' => ['required', 'max:10'],
            'harga' => ['required', 'max:10'],
            'foto' => ['mimes:jpg,png,jpeg', 'image'],
        ]);

        if ($request->hasFile('foto')) {
            $path = public_path('/thumbnailBuku/' . $buku->thumbnail_buku);
            if (file_exists($path)) {
                @unlink($path);
            }
            $request->file('foto')->move('thumbnailBuku/', time() . '-' . $request->nama_buku . '.' . $request->file('foto')->getClientOriginalExtension());
            $buku = [
                'thumbnail_buku' => time() . '-' . $request->nama_buku . '.' . $request->file('foto')->getClientOriginalExtension(),
                'nama_buku' => $request->nama_buku,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'tanggal_publikasi' => $request->tanggal_publikasi,
                'jumlah_halaman' => $request->jumlah_halaman,
                'id_genre_buku' => $request->id_genre_buku,
                'stock' => $request->stock,
                'harga' => $request->harga,
            ];
            Buku::where('id_buku', $id)->update($buku);
        } else {
            $buku = [
                'nama_buku' => $request->get('nama_buku'),
                'pengarang' => $request->get('pengarang'),
                'penerbit' => $request->get('penerbit'),
                'tanggal_publikasi' => $request->get('tanggal_publikasi'),
                'jumlah_halaman' => $request->get('jumlah_halaman'),
                'id_genre_buku' => $request->get('id_genre_buku'),
                'stock' => $request->get('stock'),
                'harga' => $request->get('harga'),
            ];
            Buku::where('id_buku', $id)->update($buku);
        }
        return redirect()->route('buku')->with('success', 'Edit Buku Sukses');

    }

    public function delete($id)
    {
        $buku = Buku::find($id);
        $path = public_path('/thumbnailBuku/' . $buku->thumbnail_buku);
        if (file_exists($path)) {
            @unlink($path);
        }
        $buku->delete();
        return redirect()->route('buku')->with('success', 'Hapus Buku Sukses');
    }


    public function index_genre_buku()
    {
        $genre_buku = GenreBuku::get();
        return view('pages.Buku.genre-buku', compact('genre_buku'));
    }

    public function tambah_genre_buku()
    {
        return view('pages.Buku.genre-buku-tambah');
    }
    
    public function add_genre_buku(Request $request)
    {
        $request->validate([
            'genre_buku' => ['required', 'max:255', 'min:2'],
        ]);

        $genreBuku = ['nama_genre_buku' => $request->genre_buku];
        GenreBuku::create($genreBuku);
        return redirect()->route('genre-buku')->with('success', 'Tambah Genre Buku Sukses');
    }

    public function edit_genre_buku($id)
    {
        $GenreBuku = GenreBuku::where('id_genre_buku', $id)->first();
        return view('pages.Buku.genre-buku-edit', compact('GenreBuku'));
    }

    public function update_genre_buku(Request $request, $id)
    {
        $request->validate([
            'genre_buku' => ['required', 'max:255', 'min:2'],
        ]);

        $genreBuku = ['nama_genre_buku' => $request->genre_buku];
        GenreBuku::where('id_genre_buku', $id)->update($genreBuku);
        return redirect()->route('genre-buku')->with('success', 'Edit Genre Buku Sukses');
    }

    public function delete_genre_buku($id)
    {
        $genre_buku = GenreBuku::find($id);
        $genre_buku->delete();
        return redirect()->route('genre-buku')->with('success', 'Hapus Genre Sukses');
    }

    public function showListBuku()
    {
        $list = 0;
        $buku = Buku::get();
        if (Session::get('id_genre_buku')) {
            $list = Session::get('id_genre_buku');
            $buku = $buku->where('id_genre_buku', $list);
        }
        $GenreBuku = GenreBuku::get();
        return view('pages.Buku.ListBuku', compact('buku', 'GenreBuku', 'list'));
    }

    public function ListBukuFilter(Request $request)
    {
        Session::put('id_genre_buku', $request->id_genre_buku);
        return redirect()->route('list-buku');
    }
    
    public function deleteFilter()
    {
        Session::forget('id_genre_buku');
        return redirect()->route('list-buku');
    }

    public function beliBuku($id)
    {
        $buku = Buku::where('id_buku', $id)->first();
        return view('pages.Buku.BeliBuku', compact('buku'));
    }

    public function storeBuku(Request $request, $id)
    {
        $getBuku = Buku::where('id_buku', $id)->first();
        $buku = [
            'stock' => $getBuku->stock - $request->jumlah,
        ];
        $riwayatPembelian = [
            "id" => auth()->id(),
            "id_buku" => $id,
            "harga_buku" => $getBuku->harga,
            "jumlah" => $request->jumlah,
            "total_harga" => $getBuku->harga * $request->jumlah,
            "tanggal_pembelian" => date('Y-m-d'),
        ];
        Buku::where('id_buku', $id)->update($buku);
        RiwayatPembelian::create($riwayatPembelian);
        return redirect()->route('list-buku')->with('success', 'Pembelian Sukses, Riwayat Pembelian Akan di Tampilkan di Menu Riwayat');
    }

    public function RiwayatPembelian()
    {
        $RiwayatPembelian = RiwayatPembelian::where('id', auth()->id())->get();
        return view('pages.Buku.RiwayatPembelian', compact('RiwayatPembelian'));
    }
}