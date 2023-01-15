@extends('master')

@section('title', 'Edit Actor')

@section('content')

<div class="container">
    <div class="judul">
        <h4>Edit Actor</h4>
    </div>

    <form enctype="multipart/form-data" action={{url('edit-actor/'.$actors->id)}} method="POST">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$actors->name}}">
            @error('name')
                {{$message}}
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Gender</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>-- Open this select menu --</option>
                    <option id="multiselect">{{$g->Female}}>{{$g->male}}</option>
            </select>
        </div>  --}}
        

        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Biography</label>
            <input type="text" class="form-control" id="actor_bio" name="biography" width="50px" value="{{$actors->biography}}">
            @error('description')
                {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Date of Birth</label>
            <input type="date" class="form-control" id="dob_actor" name="birthday" value="{{$actors->birthday}}">
            @error('release_date')
                {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Place of Birth</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{$actors->place_of_birth}}">
            @error('name')
                {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Image Url</label>
            <input type="file" class="form-control" id="actor_photo" name="image_actor" placeholder="Insert">
            @error('image_actor')
                {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Place of Birth</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{$actors->place_of_birth}}">
            @error('name')
                {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Popularity</label>
            <input type="text" class="form-control" id="popularity_actor" name="popularity" value="{{$actors->popularity}}">
            @error('name')
                {{$message}}
            @enderror
        </div>

        <div class="d-grid gap-2 btnactor">
            <button class="btn btn-danger" type="submit">Edit</button>
        </div>
    </form>
</div>

@endsection 