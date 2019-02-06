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
 
  <!-- Button to Open the Modal -->
    <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Back</a><br><br>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">

   Create New Items
  </button>

  <br><br>
   <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
       <h4 class="modal-title">Add New Items</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="row">
         <div class="col sm-6">
            <label >Name</label>
            <input  id="name" type="text" class="form-control"  placeholder="name" />
          </div></div>
          <div class="row">
            <div class="col sm-6">
          
             <!--  <input id="category"  type="text" class="form-control" placeholder="category">  -->
                  <div class="form-group">
                        <label>Select  category:</label>
                        <select class="form-control" id="type" name="type" >
                         <option value="">Please Select</option>
                         <option value=""></option>
                         <option value=""></option>
                       </select>
                     </div>
            </div></div>
            <div class="row">
              <div class="col sm-6">
                <label>Model</label>
                <input id="model" type="text" class="form-control"   placeholder="model" />
              </div>
            </div>  
            <div class="row">
              <div class="col sm-6">
                <label>Description</label>
              <textarea id="description" type="text" class="form-control"  cols="30" rows="5"> </textarea>
              </div>
            </div>  
           </div>
            <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" onclick="createItem()">Submit</button> 
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
          <td>Category </td>
          <td>Model</td>
          <td>Description</td>
          <td>Actions</td>
        </tr>
        </thead>
       <tbody>
         @foreach($items as $row)
          <tr>
             <td>{{$row->id}}</td>
             <td>{{$row->name}}</td>
             <td>{{$row->category}}</td>
             <td>{{$row->model}}</td>
             <td>{{$row->description}}</td>
             <td>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"  onclick="editItem({{ $row->id }})" class="glyphicon glyphicon-eye-open"></a>
            <a href="#" 
           onClick="event.preventDefault(); 
           if(confirm('Are you sure?')) {
           document.getElementById('itemDelete-{{$row->id}}').submit();
         }
         ">
         <i class="glyphicon glyphicon-trash"></i>
       </a>
       <form id="itemDelete-{{$row->id}}" action="{{ route('item.destroy', $row->id) }}" method="post">
        @csrf
        @method('delete')
      </form>
               <!-- <form action="{{ route('item.destroy', $row->id)}}" method="post">
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
      $('#name').on('change', function(){
     let type = $(this).val();
     $.get('/dashboard/'+ type, function(data){
       $('#category').html(data);
     });
});

    } );

     const createItem = () => {
      let name = $('#name').val();
      let category = $('#category').val();
      let model = $('#model').val();
      let description = $('#description').val();

      axios.post('/item', {
        name: name,
        category: category,
        model: model,
        description: description,
      })
      .then(response => {
        console.log(response.data);
        location.reload();
      })
      .catch(error => console.log(error)); 
    }

   



  </script>
  @endpush