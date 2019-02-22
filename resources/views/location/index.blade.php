@extends('layout')

@section('content')
<style>
.uper {
  margin-top: 40px;
}
</style>
<div class="uper">
  @if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div><br />
  @endif
  <div class="pull-right">
    <a href="{{ route('dashboard.index') }}">Back</a>
  </div>
  
 <!--  <div class="container">
   <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Back</a><br><br> -->
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
     Create New Location
   </button>
   <br><br>
   <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Add New Location</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body">
        <div class="row">
          <div class="col sm-6">
            <label >Name</label>
            <input  id="name" type="text" class="form-control"  placeholder="name" />
          </div></div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-dismiss="modal" onclick="createLocation()">Submit</button>
        </div>
      </div>
    </div>
  </div>  
</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Actions</td>
    </tr>
  </thead>
  <tbody>
    @foreach($location as $location)
    <tr>
      <td>{{$location->id}}</td>
      <td>{{$location->name}}</td>
      <td><a href="{{ route('location.edit',$location->id)}}"  class="glyphicon glyphicon-pencil"  data-toggle="modal" data-target="#myModal"></a>
        <!--  <a href="{{ route('location.show', $location->id) }}"><i class="glyphicon glyphicon-eye-open"></i></a> -->
        <a href="#" 
        onClick="event.preventDefault(); 
        if(confirm('Are you sure?')) {
        document.getElementById('locationDelete-{{$location->id}}').submit();
      }
      ">
      <i class="glyphicon glyphicon-trash"></i>
    </a>
    <form id="locationDelete-{{$location->id}}" action="{{ route('location.destroy', $location->id) }}" method="post">
      @csrf
      @method('delete')
    </form>
                <!-- <form action="{{ route('location.destroy', $location->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger"  type="submit">Delete</button>
                </form> -->
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endsection
        @push('scripts')
        <script>
          $(document).ready( function () {
            $('#example').DataTable();
          } );

          const createLocation = () => {
            let name = $('#name').val();
            
            axios.post('/location', {
              name: name,
              
            })
            .then(response => {
              console.log(response.data);
              location.reload();
            })
            .catch(error => console.log(error)); 
          }
        </script>
        @endpush

