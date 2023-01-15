@extends('master')

@section('title', 'Home Page')

@section('content')

<div class="container">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      @foreach ($rMovies as $b)
      <div class="carousel-item 
      @if ($loop->first) active
      @endif
      ">
        <img src="{{url('storage/background/'.$b->background)}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          @foreach ($b->moviegenre as $mg)
            <p>{{$mg->genre->name}}</p>
          @endforeach
          <p>{{' | ' . date('Y', strtotime($b->release_date))}} </p>
          <h1>{{$b->title}}</h1>
          <p>{{$b->description}}</p>
        </div>

        @auth
        @if (Auth::user()->role == 'member')
        <form class="d-flex" action="{{url('/addWathclist')}}">
          <button type="submit" class="btn btn-danger" id="btn-admin">
            <i class="fa-solid fa-plus"></i> Add To Watchlists
          </button>
        </form>
        @endif
        @endauth
      </div>
      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>
</div>   

<div class="popular-header">
  <div>
    <i class="fa-solid fa-fire-flame-curved"></i> Popular
    <hr />
  </div>
    
  <div class="movie-list">
    @foreach ($movies as $mo)
        <div class="movie-list-item">
          <img src="{{url('storage/thumbnail/'.$mo->thumbnail)}}">
          <p class="movie-title">{{$mo->title}}</p>
          <p class="movie-year">{{date('Y', strtotime($mo->release_date))}}</p>
        </div>
    @endforeach
  </div>
  <div class="m-5 d-flex justify-content-center">
    {{$movies->links()}}
  </div>
</div>

<div class="show-header">
  <div class="show">
    <i class="fa-solid fa-film"></i> Show
  </div>
  <form class="d-flex" action="{{url('/search')}}">
    <input class="form-control me-2" name="search" type="search" placeholder="Search">
  </form>
</div>

<div id="genre-navbar" class="body-container">
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner-genre">
      @foreach ($genres as $g)
        <button type="button" class="btn btn-light genre-choice me-2">{{$g->name}}</button>
      @endforeach
    </div>
    <div class="m-5 d-flex justify-content-center">
        {{$genres->links()}}
    </div>
  </div>
</div>

<div id="sort-navbar" class="body-container"> 
  <p>Sort By</p>
  <form class="d-flex" action="{{url('/latest')}}">
    <button id="sort-latest" type="submit" class="btn-sort me-2">Latest</button>
  </form>

  <form class="d-flex" action="{{url('/asc')}}" method="GET">
    <button id="sort-asc" type="submit" class="btn-sort me-2">A-Z</button>
  </form> 

  <form class="d-flex" action="{{url('/desc')}}">
    <button id="sort-desc" type="submit" class="btn-sort me-2">Z-A</button>
  </form>

  @auth
  @if (Auth::user()->role == 'admin')
    <a href="{{url('/insert-movie')}}" style="margin-top: 10px" class="btn btn-danger justify-content-end" >
      <i class="fa-solid fa-plus"></i> Add Movie
    </a>
  @endif
  @endauth
</div>

<div class="movie-container">
  <div class="movie-list">
    @foreach ($movies as $mo)
      <div class="movie-list-item">
        <img src="{{url('storage/thumbnail/'.$mo->thumbnail)}}">
        <p class="movie-title">{{$mo->title}}</p>
        <p class="movie-year">{{date('Y', strtotime($mo->release_date))}}</p>
          
        @auth
        @if (Auth::user()->role == 'member')
          <button type="submit" class="add-watchlist" id="btn-admin" action="{{url('/addWathclist')}}">
            <i class="fa-solid fa-plus"></i>
          </button>
        @endif
        @endauth
      </div>
    @endforeach
    <div class="m-5 d-flex justify-content-center">
      {{$movies->links()}}
    </div>
  </div>
</div>

@endsection