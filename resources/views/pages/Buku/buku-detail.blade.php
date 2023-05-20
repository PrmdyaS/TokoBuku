@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Buku Detail'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="card-body">
                        <div class="flex flex-col" style="display: flex;">
                            <img src="{{ asset('thumbnailBuku/' . $buku->thumbnail_buku) }}" alt="Gambar Buku"
                                style="width: 350px; margin-right: 20px;">
                            <div
                                style="display: flex; flex-direction: column; width: 100%;">
                                <div style="display: flex; justify-content: space-between;">
                                    <h1>{{ $buku->nama_buku }}</h1>
                                    <h3 style="display: flex">Stok:<div class="text-info" style="margin-left: 10px">{{ $buku->stock }}</div></h3>
                                </div>
                                <h1 class="text-success" style="font-size: 70px;">Rp{{ number_format($buku['harga'], 0, ',', '.') }},-
                                </h1>
                                <div class="container" style="display: flex; justify-content: space-between;  width: 100%;">
                                    <div style="display: flex; flex-direction: column;">
                                        <h4>Pengarang</h4>
                                        <h6>{{ $buku->pengarang }}</h6>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <h4>Penerbit</h4>
                                        <h6>{{ $buku->penerbit }}</h6>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <h4>Tanggal Publikasi</h4>
                                        <h6>{{ $buku->tanggal_publikasi }}</h6>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <h4>Jumlah Halaman</h4>
                                        <h6>{{ $buku->jumlah_halaman }} Halaman</h6>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <h4>Genre Buku</h4>
                                        <h6>{{ $buku->callGenreBuku['nama_genre_buku'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
