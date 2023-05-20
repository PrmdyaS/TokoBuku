@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Buku'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Buku</h6>
                    <a href="{{ route('buku-tambah') }}" name="Find" class="btn btn-sm btn-info" title="Add Data"><i
                            class="fa fa-plus"></i> Tambah Buku</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Thumbnail</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                        Buku</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pengarang
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Publikasi</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Genre</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Stock</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Harga</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku as $bukus)
                                    <tr>
                                        <td>
                                            <div class="align-middle text-center text-sm">
                                                <div class="align-middle text-center text-sm">
                                                    <img src="{{ asset('thumbnailBuku/' . $bukus->thumbnail_buku) }}" alt="" style="width: 100px;">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $bukus['nama_buku'] }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $bukus['pengarang'] }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ date('d/m/Y', strtotime($bukus['tanggal_publikasi'])) }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $bukus->callGenreBuku['nama_genre_buku'] }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $bukus['stock'] }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">
                                                Rp{{ number_format($bukus['harga'], 0, ',', '.') }},-</p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a class="text-sm font-weight-bold mb-0 cursor-pointer"
                                                    href="{{ url('/buku-detail-' . $bukus['id_buku']) }}">Detail</a>
                                                <a class="text-sm font-weight-bold mb-0 ps-2 cursor-pointer"
                                                    href="{{ url('/buku-edit-' . $bukus['id_buku']) }}">Edit</a>
                                                <a class="text-sm font-weight-bold mb-0 ps-2 cursor-pointer"
                                                    href="{{ url('/buku-delete-' . $bukus['id_buku']) }}">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
