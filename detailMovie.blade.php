@extends('master')

@section('title', 'Movie Detail')

@section('content')

<section id="actor-detail" class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="row mb-2">
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('storage/thumbnail/'. $movies->thumbnail ) }}" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="movie-title">
                    {{ $movies->title }}
                    @auth
                        @if (Auth::user()->role == 'admin')
                        <div class="admin-features">
                            <a href="edit-movie/{{$movies->id}}"><i class="fa-solid fa-edit"></i></a>
                            <br>
                            <form action="delete-movie/{{$movies->id}}" method="POST">
                                {{method_field('DELETE')}}
                                @csrf
                                <a href="delete-movie/"><i class="fa-solid fa-trash-alt"></i></a>
                            </form>
                        </div>
                        @endif
                    @endauth
                </div>

                @foreach ($movies->moviegenre as $mg)
                    <button class="genre rounded-circle">{{$mg->genre->name}}</button>
                @endforeach
                <br>
                <br>
                <i class="fa-solid fa-calendar-days" style="color: rgb(44, 44, 199)"></i>

                <div class="relase-date">
                    <h4 class="date">Release Date</h4>
                    <p>
                        {{date('Y', strtotime($movies->release_date))}}
                    </p>
                </div>

                <div class="storyline">
                    <h4 class="story">Storyline</h4>
                    <p> {{$movies->description}}</p>
                </div>
                
                <div class="director">
                    <h4 class="dir">Director</h4>
                    <p> {{$movies->director}}</p>
                </div>
            </div>
        </div>
        
        <div class="cast-body">
            <div class="actor-header">
                <i class="fa-solid fa-lines-leaning fa-lg me-2" style="color: red"></i>Cast
            </div>
            <div class="row row-cols-5">
                @foreach ($movies->movieactor as $mg)
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{url('storage/actor/'.$mg->actors->image)}}" class="w-100">
                                <div class="actor-name">
                                    <p>{{$mg->actors->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>
        
        {{-- <div class="movie-container">
            <div class="actor-header">
                <i class="fa-solid fa-pipe fa-lg"></i>More
            </div>
            <div class="row row-cols-5">
                @foreach ($movies as $m)
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{url('storage/thumbnail/'.$m->thumbnail)}}" class="w-100">
                                <div class="actor-name">
                                    <a href="{{ url('/movie') }}/{{ $m->id }}">{{ $m->title }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div> --}}
    </div>
</section>

@endsection   