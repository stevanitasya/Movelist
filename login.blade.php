@extends('master')

@section('title', 'Log In')

@section('content')

<div class="container">
    <div class="judul">
        <div class="logo2">
            <h4>Hello, Welcome Back to <span class="logo2-start">Movie</span><span class="logo2-end">List </span></h4>
        </div>
    </div>

    <form enctype="multipart/form-data" action={{ url('/') }} method="POST">
        {{csrf_field()}}
        <div class="d-grid gap-2 col-6 mx-auto">
            <div class="mb-3">
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter your email" value="{{Cookie::get('mycookie') ? Cookie::get('mycookie') : ""}}">
                <div class="error">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password" value="{{Cookie::get('mycookie') ? Cookie::get('mycookie') : ""}}">
                <div class="error">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label text-white" for="exampleCheck1">Remember me</label>
            </div>

            <button type="submit" class="btn-submit" >Login
                <i class="fa-solid fa-arrow-right"></i> 
            </button>

            <p class="login-desc text-white">Don't have an account?
                <a href= {{url('register')}}>Register now!</a>
            </p>
        </div>
    </form>

</div>

@endsection