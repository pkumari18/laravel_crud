@extends('layout')

@section('content')
<style>
.uper {
  margin-top: 40px;
}
</style>
<div class="card uper">
  <div class="card-header">
    Edit location
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('location.update', $location->id) }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value={{ $location->name }} />
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection