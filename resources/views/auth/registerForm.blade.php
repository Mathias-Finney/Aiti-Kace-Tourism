@extends('main.template')

@section('content')
    <div class="container">
        <h1 class="text-primary m-0 text-center"><i class="fa fa-map-marker-alt me-3"></i>AITI-KACE Tourism</h1>
        <h3 class="text-center">Register with Us</h3>
        <hr>
        <form class="row g-3" method="post" action="{{ route('register')}}">
            @csrf
            <span style="color: red">Fields with * are mandatory</span>
            <div class="col-md-6">
            <label for="username" class="form-label">Username <span style="color: red">**</span></label>
            <input type="text" name="username" class="@error('username') is-invalid @enderror form-control" id="username" value="{{old('username')}}" required>
            
            @error('username')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="col-md-6">
            <label for="email" class="form-label">Email <span style="color: red">**</span></label>
            <input type="email" name="email" class="@error('email') is-invalid @enderror form-control" id="email" value="{{old('email')}}" required>
            @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="col-md-6">
            <label for="password" class="form-label">Password <span style="color: red">**</span></label>
            <input type="password" name="password" class="@error('password') is-invalid @enderror form-control" id="password" required>
            @error('password')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="col-md-6">
            <label for="password" class="form-label">Confirm Password <span style="color: red">**</span></label>
            <input type="password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror form-control" id="password"  required>
            @error('password_confirmation')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="col-6">
            <label for="address1" class="form-label">Address</label>
            <input type="text" name="address1" class=" @error('address1') is-invalid @enderror form-control" id="address1" value="{{old('address1')}}">
            @error('address1')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="col-6">
            <label for="address2" class="form-label">Address 2</label>
            <input type="text" name="address2" class="@error('address2') is-invalid @enderror form-control" id="address2" value="{{old('address2')}}">
            @error('address2')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="col-md-6">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" name="nationality" class="@error('nationality') is-invalid @enderror form-control" id="nationality" value="{{old('nationality')}}">
            @error('nationality')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="col-md-6">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="@error('city') is-invalid @enderror form-control" id="city" value="{{old('city')}}">
            @error('city')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="@error('phone') is-invalid @enderror form-control" id="phone" value="{{old('phone')}}">
            @error('phone')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="col-md-6">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" name="mobile" class="@error('mobile') is-invalid @enderror form-control" id="mobile" value="{{old('mobile')}}">
            @error('mobile')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            <div class="col-md-">
            <label for="mobile" class="form-label">Profile Picture</label>
            <input type="file" name="profile_image" class="@error('profile_image') is-invalid @enderror form-control" id="profile_image" value="{{old('profile_image')}}">
            @error('profile_image')<div class="invalid-feedback">{{$message}}</div>@enderror
            </div>
            
            <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>
            <a href="{{ route('auth.login') }}" class="text-center">Already registered? Click here to login</a>
        </form>

    </div>
@endsection
