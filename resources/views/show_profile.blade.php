@extends('layouts.app')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

    @endif

    <div class="d-flex justify-content-center">
        <div class="form-box">
            <div class="container">
                <h3>My Profile</h3>
                <hr>
                <form action="{{ route('edit.profile') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ $user->name }}">
                        <label for="name">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ $user->email }}" disabled>
                        <label for="name">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="role" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ ($user->is_admin) ? 'Admin' : 'Member' }}" disabled>
                        <label for="name">Role</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Deskripsi">
                        <label for="description">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Price">
                        <label for="price">Confirm Password</label>
                    </div>
            
                    <button type="submit" class="btn btn-outline-success">Change Profile</button>
                </form>
            </div>
        </div>
        
    </div>
@endsection

    
