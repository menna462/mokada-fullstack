@extends('backend.dashboard')
@section('main')
    <div class=" mt-10" id="layoutSidenav_content">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf

                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Role</label>
                    <select name="role" class="form-control">
                        <option value="">اختر الدور</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-success btn-block mt-5">Create New User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
