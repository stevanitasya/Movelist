@extends('master')

@section('title', 'Actors')

@section('content')

<section id="actor-detail" class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="row mb-2">
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('storage/actor/'. $actors->image) }}" class="w-100">
                            @if (Auth::user()->role == 'admin')
                            <div class="admin-features">
                                <a href="edit-actor/{{$actors->id}}"><i class="fa-solid fa-edit"></i></a>
                                <br>
                                <form action="delete-actor/{{$actors->id}}" method="POST">
                                    {{method_field('DELETE')}}
                                    @csrf
                                    <a href="delete-actor/"><i class="fa-solid fa-trash-alt"></i></a>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="title">
                            Personal Info    
                        </p>
                        <div class="sub-subtitle">
                            Popularity
                        </div>
                        <div class="sub-value">
                            {{ $actor->actors->popularity }}
                        </div>
                        <div class="sub-subtitle">
                            Birthday
                        </div>
                        <div class="sub-value">
                            {{ $actor->actors->birthday }}
                        </div>
                        <div class="sub-subtitle">
                            Place of Birth
                        </div>
                        <div class="sub-value">
                            {{ $actor->actors->place_of_birth }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="actor-name">
                    {{ $actor->actors->name }}
                </div>
                <p class="subtitle">Biography</p>
                <p>
                    {{ $actor->actors->biography }}
                </p>
                <p class="subtitle">Known For</p>
                <div class="row">
                    <div class="col-md-2">
                        <div class="card">
                            <img src="{{ asset('storage/thumbnail/'. $actor->movies->thumbnail ) }}" class="w-100">
                            <span class="movie-title">{{ $actor->movies->title }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection   