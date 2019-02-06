@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Item
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('item.update', $item->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" value={{ $item->name }} />
        </div>
        <div class="form-group">
          <label for="category">category :</label>
          <input type="text" class="form-control" name="category" value={{ $item->category }} />
          </div>
         <div class="form-group">
          <label for="model">model:</label>
          <input type="text" class="form-control" name="model" value={{ $item->model }} />
         </div>
           <div class="form-group">
          <label for="barcode">barcode:</label>
          <input type="text" class="form-control" name="barcode" value={{ $item->barcode }} />
          </div>
         <div class="form-group">
          <label for="description">description:</label>
          <input type="text" class="form-control" name="description" value={{ $item->description }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection