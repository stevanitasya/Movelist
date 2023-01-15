@extends('master')

@section('title', 'My Watchlist')

@section('content')

<div class="container">
    <div class="watchlst-header">
        <i class="fa-solid fa-bookmark fa-3x me-2" style="color: red;"></i><span><h1 style="color: white;">My <span class="profile text-danger">Watchlist</span></h1></span>
    </div>
    <div class="search-watchlist">
        <form class="d-flex" action="{{url('/searchWa')}}">
            <input class="form-control me-2" name="search" type="search" placeholder="Search">
        </form>
    </div>
    <div class="filter-container" name="filter">
        <i class="fa-solid fa-filter fa-lg me-2" style="color: grey;"></i>
        <span>
            <div class="dropdown-filter">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{url('/all')}}">All</a></li>
                <li><a class="dropdown-item" href="{{url('/filter')}}">Planned</a></li>
                <li><a class="dropdown-item" href="{{url('/filter')}}">Watching</a></li>
                <li><a class="dropdown-item" href="{{url('/filter')}}">Finished</a></li>
                </ul>
            </div>
        </span>
    </div>  
    <div class="watchlist-container">
        @foreach ($watchlistitems as $wi)
            <table class="watchlist-table" id="watchlist-table" style="position: relative; width: 100%; color: white;">
                <thead class="table-header">
                    <tr>
                        <th style="width: 30%;">Poster</th>
                        <th style="width: 30%;">Title</th>
                        <th style="width: 30%;">Status</th>
                        <th style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody id="watchlist-card">
                    @foreach($movies as $m)
                        <tr style="background-color: rgb(21, 21, 21); margin-bottom: 20px; border-bottom: black solid 20px;">
                            <td>
                                <img src="{{url('storage/thumbnails/'. $m->thumbnail) }}">
                            </td>
                            <td>{{$m->title}}</td>
                            <td class="watchlist-status">{{$m->status}}</td>
                            <td>
                                <div class="action">
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-ellipsis" id="{{$m->movie_id}}"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach  
    </div>
    {{-- <div class="m-5 d-flex justify-content-center">
        Showing {{ $movies->firstItem() }} to {{ $movies->lastItem() }} of {{ $movies->total() }} results
        {{$watchlistitems->links()}}
    </div> --}}
</div>    

<form enctype="multipart/form-data" action="{{url('/modalWa')}}" method="POST">
    {{csrf_field()}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="action-container">  
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>-- Open this select menu --</option>
                                <option selected value="All">All</option>
                                <option value="Planned">Planned</option>
                                <option value="Watching">Watching</option>
                                <option value="Finished">Finished</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="save-picture">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection