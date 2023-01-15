@extends('master')

@section('title', 'Update Image')

@section('content')

<form enctype="multipart/form-data" action="{{url('modal')}}" method="POST">
  {{csrf_field()}}
  <div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="image-url" class="form-input" id="image-url" placeholder="Image URL">
          @error('image-url')
              {{$message}}
          @enderror
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save-image">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form> 

@endsection