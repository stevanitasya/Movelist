@extends('master')

@section('title', 'Profile')

@section('content')

<div class="profile-container">
    <div class="profile-left">
        <div class="my-profile-header">
            <h1>My <span class="profile text-danger">Profile</span></h1>
            @auth
            @if (Auth::user()->image == '')
                <div class="profile-image">
                    <button type="button" class="btn btn-dark rounded-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-user fa-4x"></i>
                    </button>
                </div>
            @else
                <div class="profile-image">
                    <button type="button" class="btn btn-dark rounded-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="{{$users->image}}" alt="">
                        {{-- <i class="fa-solid fa-dolphin"></i> --}}
                    </button>
                </div>
            @endif     
            @endauth
        </div>

        <div class="profile-desc">
            <h4 class="username-name" value="{{$users->username}}">{{$users->username}}</h4>
            <p class="username-email" value="{{$users->email}}">{{$users->email}}</p>
        </div>
    </div>
    
    <div class="profile-form-right">
        <h1 class="profile-form-header text-danger">Update Profile</h1>
        <form enctype="multipart/form-data" action="{{ url('/profile') }}" method="POST">
            {{csrf_field()}}
            <div class="mb-3">
                <label for="floatingInput" class="form-label text-light">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{$users->username}}">
                <div class="error">
                    @error('username')
                        {{$message}}
                    @enderror
                </div>    
            </div>
            <div class="mb-3">
                <label for="floatingInput" class="form-label text-light">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$users->email}}">
                <div class="error">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="floatingInput" class="form-label text-light">DOB</label>
                <input type="date" class="form-control" id="dob" name="dob" value="{{$users->dob}}">
                <div class="error">
                    @error('dob')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="floatingInput" class="form-label text-light">Phone</label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{$users->phoneNumber}}">
                <div class="error">
                    @error('phoneNumber')
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-danger" type="submit">Save Changes</button>
            </div>   
        </form>
    </div>
</div>

<form enctype="multipart/form-data" action="{{url('/modal')}}" method="POST">
    {{csrf_field()}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="image" class="form-input" id="image-url" placeholder="Image URL">
                    {{-- @error('image-url')
                        {{$message}}
                    @enderror --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="save-picture">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- <script src="/script.js">

</script> --}}
@endsection