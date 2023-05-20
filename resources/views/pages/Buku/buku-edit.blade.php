@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Buku Edit'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Buku</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/buku-update-' . $buku->id_buku) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Thumbnail Buku</label>
                                <div>
                                    <img src="{{ asset('thumbnailBuku/' . $buku->thumbnail_buku) }}" alt="" style="width: 300px; margin-bottom: 30px;">
                                </div>
                                <input type="file" name="foto" class="form-control" aria-label="foto">
                                @error('foto')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Nama Buku</label>
                                <input type="text" name="nama_buku" class="form-control" placeholder="Nama Buku"
                                    aria-label="nama_buku" value="{{ $buku->nama_buku }}">
                                @error('nama_buku')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Pengarang</label>
                                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang"
                                    aria-label="pengarang" value="{{ $buku->pengarang }}">
                                @error('pengarang')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit"
                                    aria-label="penerbit" value="{{ $buku->penerbit }}">
                                @error('penerbit')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Tanggal Publikasi</label>
                                <input type="date" name="tanggal_publikasi" class="form-control"
                                    placeholder="Tanggal Publikasi" aria-label="tanggal_publikasi"
                                    value="{{ $buku->tanggal_publikasi }}">
                                @error('tanggal_publikasi')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Jumlah Halaman</label>
                                <input type="number" name="jumlah_halaman" class="form-control"
                                    placeholder="Jumlah Halaman" aria-label="jumlah_halaman"
                                    value="{{ $buku->jumlah_halaman }}">
                                @error('jumlah_halaman')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Genre Buku</label>
                                <select class="form-control" name="id_genre_buku">
                                    @foreach ($GenreBuku as $GenreBukus)
                                        @if ($GenreBukus['id_genre_buku'] == $buku['id_genre_buku'])
                                            <option value="{{ $GenreBukus['id_genre_buku'] }}" selected>
                                                {{ $GenreBukus['nama_genre_buku'] }}</option>
                                        @else
                                            <option value="{{ $GenreBukus['id_genre_buku'] }}">
                                                {{ $GenreBukus['nama_genre_buku'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('user-group')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Stock</label>
                                <input type="text" name="stock" class="form-control" placeholder="Stock"
                                    aria-label="stock" value="{{ $buku->stock }}">
                                @error('stock')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Harga</label>
                                <input type="number" name="harga" class="form-control" placeholder="Harga"
                                    aria-label="stock" value="{{ $buku->harga }}">
                                @error('stock')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
