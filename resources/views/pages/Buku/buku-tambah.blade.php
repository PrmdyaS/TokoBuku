@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Buku Tambah'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Buku</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="card-body">
                        <form method="POST" action="{{ route('buku-tambah-process') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Thumbnail Buku</label>
                                <input type="file" name="foto" class="form-control"
                                    aria-label="foto">
                                @error('foto')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Nama Buku</label>
                                <input type="text" name="nama_buku" class="form-control" placeholder="Nama Buku"
                                    aria-label="nama_buku">
                                @error('nama_buku')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Pengarang</label>
                                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang"
                                    aria-label="pengarang">
                                @error('pengarang')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit"
                                    aria-label="penerbit">
                                @error('penerbit')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Tanggal Publikasi</label>
                                <input type="date" name="tanggal_publikasi" class="form-control" placeholder="Tanggal Publikasi"
                                    aria-label="tanggal_publikasi">
                                @error('tanggal_publikasi')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Jumlah Halaman</label>
                                <input type="number" name="jumlah_halaman" class="form-control" placeholder="Jumlah Halaman"
                                    aria-label="jumlah_halaman">
                                @error('jumlah_halaman')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Genre Buku</label>
                                <select class="form-control" name="id_genre_buku">
                                    <option value="" hidden>Pilih Genre Buku</option>
                                    @foreach ($GenreBuku as $GenreBukus)
                                        <option value="{{ $GenreBukus['id_genre_buku'] }}">
                                            {{ $GenreBukus['nama_genre_buku'] }}</option>
                                    @endforeach
                                </select>
                                @error('user-group')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Stock</label>
                                <input type="text" name="stock" class="form-control" placeholder="Stock"
                                    aria-label="stock">
                                @error('stock')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Harga</label>
                                <input type="number" name="harga" class="form-control" placeholder="Harga"
                                    aria-label="stock">
                                @error('stock')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
