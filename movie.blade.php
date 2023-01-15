@extends('master')

@section('title', 'Movies')

@section('content')

<section id="actors" class="pt-5">
    <div class="container">   
        <div class="row justify-content-between pb-3" id="movie-container">
            <div class="col">
                <h4 class="text-danger fw-bold">Movies</h4>
            </div>

            <div class="col2">
                @auth
                @if (Auth::user()->role == 'admin')
                    <a href="{{url('/insert-movie')}}" style="margin-top: 10px" class="btn btn-danger justify-content-end" >
                    <i class="fa-solid fa-plus"></i> Add Movie
                    </a>
                @endif
                @endauth

                <div class="title-actor-left">
                    <form class="d-flex" action="{{url('/search')}}">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search Movie Address">
                    </form>
                </div>
            </div>
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
    </div>
</section>

@endsection   