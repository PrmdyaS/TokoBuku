@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management Edit'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit User</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="card-body">
                        <form method="POST" action="{{ url('user-management-update-' . $User['id']) }}">
                            @csrf
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Kasta User</label>
                                <select class="form-control" name="user-group">
                                    @foreach ($UserGroup as $UserGroups)
                                        @if ($UserGroups['id_users_grup'] == $User['id_users_grup'])
                                            <option value="{{ $UserGroups['id_users_grup'] }}" selected>
                                                {{ $UserGroups['users_grup_name'] }}</option>
                                        @else
                                            <option value="{{ $UserGroups['id_users_grup'] }}">
                                                {{ $UserGroups['users_grup_name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('user-group')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username"
                                    aria-label="Name" value="{{ $User['username'] }}">
                                @error('username')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Firstname</label>
                                <input type="text" name="firstname" class="form-control" placeholder="Firstname"
                                    aria-label="Firstname" value="{{ $User['firstname'] }}">
                                @error('firstname')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Lastname</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Lastname"
                                    aria-label="Lastname" value="{{ $User['lastname'] }}">
                                @error('lastname')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    aria-label="Email" value="{{ $User['email'] }}">
                                @error('email')
                                    <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex flex-col mb-3">
                                <label for="example-text-input" class="form-control-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    aria-label="Password" value="">
                                @error('password')
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
