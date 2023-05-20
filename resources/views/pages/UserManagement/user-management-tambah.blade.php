@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management Tambah'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah User</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="card-body">
                        <form method="POST" action="{{ route('user-management-tambah-process') }}">
                            @csrf
                            <div class="flex flex-col mb-3">
                                <select class="form-control" name="user-group">
                                    <option value="" hidden>Pilih Kasta User</option>
                                    @foreach ($UserGroup as $UserGroups)
                                        <option value="{{ $UserGroups['id_users_grup'] }}">
                                            {{ $UserGroups['users_grup_name'] }}</option>
                                    @endforeach
                                </select>
                                @error('user-group')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username"
                                    aria-label="Name">
                                @error('username')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <input type="text" name="firstname" class="form-control" placeholder="Firstname"
                                    aria-label="Firstname">
                                @error('firstname')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <input type="text" name="lastname" class="form-control" placeholder="Lastname"
                                    aria-label="Lastname">
                                @error('lastname')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    aria-label="Email">
                                @error('email')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    aria-label="Password">
                                @error('password')
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
