@extends('master')

@section('title', 'Add Movie')

@section('content')

<div class="container">
    <div class="judul">
        <h4>Add Movie</h4>
    </div>

    <form enctype="multipart/form-data" action={{ url('insert-movie') }} method="POST">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Title</label>
            <input type="text" class="form-control" id="title" name="title">
            @error('title')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Description</label>
            <input type="text" class="form-control" id="movie_desc" name="description" width="50px">
            @error('description')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Genre</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>-- Open this select menu --</option>
                @foreach ($genres as $g)
                    <option id="multiselect">{{$g->name}}</option>
                @endforeach
            </select>
        </div>    
        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Actors</label>
            <br>
            <div id="container-actor">
                <div class="actors">
                    <div class="row">
                        <div class="col">
                            <label for="floatingInput" class="form-label text-light">Actor</label>
                            <select name="actor" class="form-select" aria-label="Default select example">
                                <option selected>-- Open this select menu --</option>
                                @foreach ($actors as $a)
                                    <option id="multiselect">{{$a->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="floatingInput" class="form-label text-light">Character Name</label>
                            <input type="text" class="form-control" id="character_name" name="character_name">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col">
                            <label for="floatingInput" class="form-label text-light">Actor</label>
                            <select name="actor" class="form-select" aria-label="Default select example">
                                <option selected>-- Open this select menu --</option>
                                @foreach ($actors as $a)
                                    <option id="multiselect">{{$a->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="floatingInput" class="form-label text-light">Character Name</label>
                            <input type="text" class="form-control" id="character_name" name="character_name">
                        </div>
                    </div>      
                </div>
            </div>
            <div class="add d-flex justify-content-end">
                <div id="add-more" class="btn btn-primary btn-add-more">Add More</div>
            </div>
        </div> 
        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Director</label>
            <input type="text" class="form-control" id="movie_director" name="director">
            @error('director')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Release Date</label>
            <input type="date" class="form-control" id="movie_date" name="release_date">
            @error('release_date')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Image Url</label>
            <input type="file" class="form-control" id="movie_thumbnail" name="thumbnail" placeholder="Insert">
            @error('thumbnail')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="floatingInput" class="form-label text-light">Background Url</label>
            <input type="file" class="form-control" id="movie_background" name="background" placeholder="Insert">
            @error('background')
                {{$message}}
            @enderror
        </div>

        <div class="d-grid gap-2 btnMovie">
            <button class="btn btn-danger" type="submit">Create</button>
        </div>

    </form>
</div>

<script>
    $(document).ready(function(){
        $('#add-more').on('click', function(){
            $('#container-actor').append(
                `<div class="row">
                        <div class="col">
                            <label for="floatingInput" class="form-label text-light">Actor</label>
                            <select name="actor" class="form-select" aria-label="Default select example">
                                <option selected>-- Open this select menu --</option>
                                @foreach ($actors as $a)
                                    <option id="multiselect">{{$a->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="floatingInput" class="form-label text-light">Character Name</label>
                            <input type="text" class="form-control" id="character_name" name="character_name">
                        </div>
                </div> `
            );
        })    
    });
</script>

@endsection   