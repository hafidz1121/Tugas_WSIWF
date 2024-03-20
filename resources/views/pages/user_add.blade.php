@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mt-2">Add Data User</h4>
    </div>

    <div class="card-body p-5">
        <form class="row g-3" method="POST" action="{{ route('user.create') }}">
            @csrf

            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
            </div>

            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>

                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autocomplete="new-password">
            </div>

            <div class="col-md-6">
                <label for="password-confirm" class="form-label">Confirm Password</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password">
            </div>

            <div class="col-md-10">
                <label for="address" class="form-label">Address</label>

                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autocomplete="address">
            </div>

            <div class="col-md-2">
                <label for="role" class="form-label">Role</label>

                <select class="form-select" aria-label="Select role" id="role" name="role" required>
                    <option selected>- Role -</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                </select>
                <div class="invalid-feedback">Please select a role.</div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>

                <a href="{{ route('user') }}" class="btn btn-outline-success">
                    Back
                </a>
            </div>
        </form>
    </div>
</div>
@endsection