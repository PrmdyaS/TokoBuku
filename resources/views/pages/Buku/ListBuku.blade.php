@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Buku'])
    <style>
        .book:hover {
            transform: scale(1.02);
            box-shadow: 3px 3px 5px 0px rgba(0, 0, 0, 0.30);
        }
    </style>
    <div class="row mt-4 mx-4">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form action="/list-buku/filter" id="formGenre">
                <div class="card mb-4"
                    style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: flex-start; padding: 5px;">
                    <div style="display:flex; width:100%; justify-content:center; align-items:center;">
                        <select class="form-control" name="id_genre_buku" id="genre_buku" style="margin: 15px">
                            @if ($list == 0)
                                <option value="" hidden>Pilih Genre Buku</option>
                                @foreach ($GenreBuku as $GenreBukus)
                                    <option value="{{ $GenreBukus['id_genre_buku'] }}">
                                        {{ $GenreBukus['nama_genre_buku'] }}</option>
                                @endforeach
                            @else
                                @foreach ($GenreBuku as $GenreBukus)
                                    @if ($GenreBukus['id_genre_buku'] == $list)
                                        <option value="{{ $GenreBukus['id_genre_buku'] }}" selected>
                                            {{ $GenreBukus['nama_genre_buku'] }}</option>
                                    @else
                                        <option value="{{ $GenreBukus['id_genre_buku'] }}">
                                            {{ $GenreBukus['nama_genre_buku'] }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <a href={{ route('deleteFilter') }}
                            class="btn bg-gradient-danger w10 my-0 mb-2">X</a>
                    </div>

                    @if ($buku->count() == 0)
                        <h1 style="text-align: center; width:100%;">Buku Tidak Ditemukan</h1>
                    @else
                        @foreach ($buku as $bukus)
                            <div class="card book"
                                style="display: flex; flex-direction: column; width: 200px; margin: 10px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer;">
                                <a href={{ url('/beli-buku-' . $bukus['id_buku']) }}>
                                    <img src="{{ asset('thumbnailBuku/' . $bukus->thumbnail_buku) }}" alt=""
                                        style="width: 200px;">
                                    <div style="display: flex; flex-direction: column; padding: 10px; margin: 10px;">
                                        <h4 class="text-dark" style="font-size: 18px;">{{ $bukus['nama_buku'] }}</h4>
                                        <h1 class="text-dark" style="font-size: 24px; margin-top: -10px;">
                                            Rp{{ number_format($bukus['harga'], 0, ',', '.') }},-
                                            <h5 class="text-dark" style="font-size: 14px; margin-top: -5px;">Karya :
                                                {{ $bukus['pengarang'] }}</h5>
                                            <h5 class="text-dark" style="font-size: 14px; margin-top: -5px;">Genre :
                                                {{ $bukus->callGenreBuku['nama_genre_buku'] }}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </form>
        </div>
    </div>
    <script>
        const GenreBuku = document.getElementById('genre_buku');
        const form = document.getElementById('formGenre');
        GenreBuku.addEventListener('change', () => {
            form.submit();
        });
    </script>
@endsection
