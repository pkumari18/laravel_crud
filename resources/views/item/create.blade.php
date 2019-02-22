@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
  Create Items
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

     <form method="post" action="{{ route('item.store') }}">
          <div class="form-group">
              @csrf
              <label for="name"> Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
             
             <label>Category:</label>
              <select class="form-control select2" id="category_id">
               <option value="">Please Select</option>
               @foreach($category as $row)
               <option value="{{ $row->id }}">{{ $row->name }}</option><br><br>
  
               @endforeach
             </select>
          </div>
          <div class="form-group">
             <label for="model"> model:</label>
               <input type="text" class="form-control" name="model"/>
          </div>

           <div class="form-group">
           <label for="description">Description:</label>
          <textarea type="text" class="form-control"  cols="30" rows="5"> </textarea>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>

@endsection
 @push('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $(document).ready( function () {
       
        $('.select2').select2();
      });
