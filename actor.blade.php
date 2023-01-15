@extends('master')

@section('title', 'Actors')

@section('content')

<section id="actors" class="pt-5">
    <div class="container">   
        <div class="row justify-content-between pb-3">
            <div class="col">
                <h4 class="text-danger fw-bold">Actors</h4>
            </div>
            @if (Auth::user()->role == 'admin')
            <div class="col text-end">
                <a href="insert-actor" class="btn btn-danger btn-sm">Add Actor</a>
            </div>
            @endif
            <div class="title-actor-left">
                <form class="d-flex" action="{{url('/searchAc')}}">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search Actor Address">
                </form>
            </div>
        </div> 
        <div class="row row-cols-5">
            @foreach ($actors as $actor)
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/actor/'. $actor->actors->image ) }}" class="w-100">
                            <div class="actor-name">
                                <a href="{{ url('/actor') }}/actor/{{ $actor->actors->id }}">{{ $actor->actors->name }}</a>
                            </div>
                            <div class="actor-movies">
                                {{ $actor->movies->title }}
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
</section>

@endsection   