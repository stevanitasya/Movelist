@extends('master')

@section('title', 'Register')

@section('content')

<div class="container">
    <div class="judul">
        <div class="logo2">
            <h4>Hello, Welcome Back to <span class="logo2-start">Movie</span><span class="logo2-end">List </span></h4>
        </div>
    </div>

        <form enctype="multipart/form-data" action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="d-grid gap-2 col-6 mx-auto">
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                    <div class="error">
                        @error('username')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="{{Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : "" }}">
                    <div class="error">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                    <div class="error">
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Enter your confirm password">
                    <div class="error">
                        @error('password_confirm')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn-submit" >Register
                    <i class="fa-solid fa-arrow-right"></i> 
                </button>

                <p class="login-desc text-white">Already have an account?
                    <a href="{{url('login')}}">Login now!</a>
                </p>
            </div>
        </form>

</div>

@endsection