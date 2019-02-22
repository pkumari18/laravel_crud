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
  <div class="container">
    <div class="pull-right"> 
      <a href="{{ route('dashboard.index') }}">Back</a>
    </div>
    <!-- Button to Open the Modal -->
    <!--  <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Back</a><br><br> -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
     Create New Category
   </button>
   <br><br>
   <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h4 class="modal-title">Create New Category</h4> 
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
          <button class="btn btn-primary" data-dismiss="modal" onclick="createCategory()">Submit</button>
        </div>
      </div>
    </div>
  </div>  
</div>
<table id="myTable" class="table table-striped table-bordered" style="width:100%">
  <thead>
   <tr>
     <td>ID</td>
     <td>Name</td>
     <td>Actions</td>
   </tr>
 </thead>
 <tbody>
   @foreach($category as $category)
   <tr>
     <td>{{$category->id}}</td>
     <td>{{$category->name}}</td>
     <td><a href="{{ route('category.edit',$category->id)}}" class="glyphicon glyphicon-pencil"data-toggle="modal" data-target="#myModal"></a>
      <!--  <a href="{{ route('category.show', $category->id) }}"><i class="glyphicon glyphicon-eye-open"></i></a> -->
      <a href="#" 
      onClick="event.preventDefault(); 
      if(confirm('Are you sure?')) {
      document.getElementById('categoryDelete-{{$category->id}}').submit();
    }
    ">
    <i class="glyphicon glyphicon-trash"></i>
  </a>
  <form id="categoryDelete-{{$category->id}}" action="{{ route('category.destroy', $category->id) }}" method="post">
    @csrf
    @method('delete')
  </form>
<!-- 
               <form action="{{ route('category.destroy', $category->id)}}" method="post">
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
          $('#myTable').DataTable();
        } );
        const createCategory = () => {
          let name = $('#name').val();

          axios.post('/category', {
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
