@extends('layout')
@section('content')
<style>
.uper {
  margin-top: 40px;
}

/* .bs-example div[class^="col"] {
  border: 1px solid white;
  background: #f5f5f5;
  text-align: center;
  padding-top: 8px;
  padding-bottom: 8px;
}

body {font-family: Arial;}

/ Style the tab /
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/ Style the buttons inside the tab /
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/ Change background color of buttons on hover /
.tab button:hover {
  background-color: #ddd;
}

/ Create an active/current tablink class /
.tab button.active {
  background-color: #ccc;
}

/ Style the tab content /
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}


  Add some padding on document's body to prevent the content
  to go underneath the header and footer
  body{  

    padding-top: 60px;
    padding-bottom: 40px;
  }
  .container{
    width: 200%;
    margin:  auto; Center the DIV horizontally
  }
  .fixed-header, .fixed-footer{

    width: 100%;
    position: fixed;        
    background: #ebf2f9;
    padding: 20px 0;
    color:  #ebf2f9;
  }
  .fixed-header{
    margin-right:100px;
   
     top: 0;

  }
  .fixed-footer{

    bottom: 0;
  }  
  body, html {
  height: 100%;
}
  
  Some more styles to beutify this example
  nav a{
    color: #fff;
    text-decoration: none;
    padding: 7px 25px;
    display: inline-block;
  }
  .container p{

    line-height: 200px; Create scrollbar to test positioning
  } */
</style>
<br><br>
<body>
 <div class="fixed-header">

 <!--  <button style="margin: 5px;" class="btn btn-primary  delete-all" data-url="">Delete</button> -->
      <a href="{{ route('category.index') }}" >Category</a>
      <a href="{{ route('location.index') }}" >Location</a>
    <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Create New 
    </button> -->
   
  <div class="container">             
    </div>
    </div>   
    <div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
    {{ session()->get('success') }}  
    </div>
     @endif
    <div class="container">
    <div class="pull-right">
  <a href="{{ route('dashboard.index') }}">Back</a>
   <!-- <button style="margin: 5px;" class="btn btn-primary  generate-barcode" data-url="">Excel Import</button>
     <button style="margin: 5px;" class="btn btn-primary  generate-barcode" data-url="">Excel Update</button>
      -->
   </div>
   <div class="input-group">
   <span class="add-on">
   <button style="margin: 5px;" class="btn btn-primary  delete-all" data-url="">Delete</button>
   <a href="{{route('item.create')}}" class="btn btn-primary">Create</a><br><br>

      <!--  <button style="margin: 5px;" class="btn btn-primary  generate-barcode" data-url="">Generate Barcodes</button> -->
  <!--  <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" /> -->
     </span>
 </div>   
</div>  
 <!--   <div class="modal" id="myModal">
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
           <div class="form-group">
             <label>category:</label>
             <select class="form-control select2" id="category_id">
               <option value="">Please Select</option>
               @foreach($category as $row)
               <option value="{{ $row->id }}">{{ $row->name }}</option><br><br>
  
               @endforeach
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
    </div>  --> 
</div>
<table id="myTable" class="table table-striped table-bordered" style="width:100%">
 <thead>
  <tr>
   <td width="50px"><input type="checkbox" id="check_all"></td>
   <td> Item's ID</td>
   <td>Name</td>
   <td>Category </td>
   <td>Model</td>
   <td>Description</td>
   <th width="100px">Actions</th>
   </tr>
</thead>
<tbody>
 @foreach($items as $items)
   <tr id="tr_{{$items->id}}">
   <td><input type="checkbox" class="checkbox" data-id="{{$items->id}}"></td>
   <td>{{$items->id}}</td>
    <td>{{$items->name}}</td>
    <td>{{ Helper::get_category_name_by_id($items->category_id)}}</td>
    <td>{{$items->model}}</td>
    <td>{{$items->description}}</td>
    <td>
     <!--  <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"  onclick="editItem({{ $items->id }})" class="glyphicon glyphicon-eye-open"></a> -->
    <a href="{{ route('item.edit',$items->id)}}" class="glyphicon glyphicon-pencil"></a>

             <!--    <a href="#" 
                    onClick="event.preventDefault(); 
                    if(confirm('Are you sure?')) {
                    document.getElementById('itemDelete-{{$items->id}}').submit();
                            }
                            ">
                            <i class="glyphicon glyphicon-trash"></i>
                            </a>
                           <form id="itemDelete-{{$items->id}}" action="{{ route('item.destroy', $items->id) }}" method="post">
                           @csrf
                           @method('delete')
                           </form>   
                        
                        -->
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

    $('#check_all').on('click', function(e) {

   if($(this).is(':checked',true))  
 {
  $(".checkbox").prop('checked', true);  

} else {  

  $(".checkbox").prop('checked',false);  

}  

});


$('.checkbox').on('click',function(){

  if($('.checkbox:checked').length == $('.checkbox').length){

    $('#check_all').prop('checked',true);

  }else{

    $('#check_all').prop('checked',false);

  }

});


$('.delete-all').on('click', function(e) {


  var idsArr = [];  

  $(".checkbox:checked").each(function() {  

    idsArr.push($(this).attr('data-id'));

  });  


  if(idsArr.length <=0)  

  {  

    alert("Please select atleast one record to delete.");  

  }  else {  


    if(confirm("Are you sure, you want to delete the selected items?")){  


      var strIds = idsArr.join(","); 


      $.ajax({

        url: "{{ route('item.multiple-delete') }}",

        type: 'DELETE',

        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        data: 'ids='+strIds,

        success: function (data) {

          if (data['status']==true) {

            $(".checkbox:checked").each(function() {  

              $(this).parents("tr").remove();

            });

            alert(data['message']);

          } else {

            alert('Whoops Something went wrong!!');

          }

        },

        error: function (data) {

          alert(data.responseText);

        }

      });


    }  

  }  

});


$('[data-toggle=confirmation]').confirmation({

  rootSelector: '[data-toggle=confirmation]',

  onConfirm: function (event, element) {

    element.closest('form').submit();

  }

});   

});
       </script>
    @endpush
 <!--  -->  <!--   const createItem = () => {
       let name = $('#name').val();
       let category_id = $('#category_id').val();
       let model = $('#model').val();
       let description = $('#description').val();
       axios.post('/item', {
         name: name,
         category_id: category_id,
         model: model,
         description: description,
       })
       .then(response => {
         console.log(response.data);
         location.reload();
       })
       .catch(error => console.log(error)); 
     }
  
  
     $(function() {
       $('input[name="daterange"]').daterangepicker({
         opens: 'left'
       }, function(start, end, label) {
         console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
       });*/ -->