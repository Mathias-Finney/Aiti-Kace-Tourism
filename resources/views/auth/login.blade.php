@extends('main.template')

@section('content')
    <div class="container">
        <h1 class="text-primary m-0 text-center"><i class="fa fa-map-marker-alt me-3"></i>AITI-KACE Tourism</h1>
        <h3 class="text-center">Login Here</h3>
        <hr>
        <form class="row g-3" method="post" action="{{ route('login')}}">
            @csrf
            
            <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="col-md-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            </div>
            
            <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
            <a href="{{ route('auth.register')}}" class="text-center">Not registered? Click here to <span>Register</span></a>
        </form>

    </div>
@endsection
