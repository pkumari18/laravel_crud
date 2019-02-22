@extends('layout')

@section('content')
<style>
.uper {
  margin-top: 40px;
}
</style>
<div class="card uper">
  <div class="card-header">
    Edit  Information
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
    <form method="post" action="{{ route('helpdesk.update', $abc->id) }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <label for="issues"> Issues:</label>
        <input type="text" class="form-control" name="issues" value={{ $abc->issues}} />
      </div>
      <div class="form-group">
        <label for="type">Type:</label>
        <input type="text" class="form-control" name="type" value={{ $abc->type}}/>
      </div>
      <div class="form-group">
        <label for="priority">Priority</label>
        <input type="text" class="form-control" name="priority" value={{ $abc->priority }} />
      </div>
      <div class="form-group">
        <label for="description ">description :</label>
        <input type="text" class="form-control" name="description " value={{ $abc->description  }} />
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection