@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Genre Buku Tambah'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Genre Buku</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="card-body">
                        <form method="POST" action="{{ route('genre-buku-tambah-process') }}">
                            @csrf
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Nama Genre Buku</label>
                                <input type="text" name="genre_buku" class="form-control" placeholder="Nama Genre Buku"
                                    aria-label="genre_buku">
                                @error('genre_buku')
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
