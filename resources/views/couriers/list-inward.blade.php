@extends('layout')
@section('content')
<style>
.uper {
  margin-top: 40px;
}
th{
  color: green;
}

</style>
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}  
</div><br />
@endif
<div class="form-group">

  <div class="row">
    <div class="col sm-12">
     <h4><b>INWARD COURIERS</b></h4>
     <a href="{{ route('couriers.index') }}" class="btn btn-primary">Back</a>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
   </div></div></div>
   <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Form</th>
        <th>To</th>
        <th>Received By</th>
        <th>Descriptions</th> 
        <th>Date</th>
        <th colspan="1">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($couriers as $couriers)
      <tr>
        <td>{{$couriers->id}}</td>
        <td>{{$couriers->from}}</td>
        <td>{{$couriers->to}}</td>
        <td>{{$couriers->received_by}}</td>
        <td>{{$couriers->description}}</td>
        <!-- <td>{{$couriers->handovers}}</td> -->
        <td>{{$couriers->created_at}}</td>
        <!-- <td><a href="{{ route('couriers.edit', $couriers->id) }}">  <i class="small material-icons">edit</i></td>--> 
          <td>
           <a href="{{ route('couriers.show', $couriers->id) }}"><i class="glyphicon glyphicon-eye-open"></i></a>

           <a href="{{ route('couriers.edit', $couriers->id) }}"><i class="glyphicon glyphicon-pencil"></i></a>

           <a href="#" 
           onClick="event.preventDefault(); 
           if(confirm('Are you sure?')) {
           document.getElementById('inwardDelete-{{$couriers->id}}').submit();
         }
         ">
         <i class="glyphicon glyphicon-trash"></i>
       </a>
       <form id="inwardDelete-{{$couriers->id}}" action="{{ route('couriers.destroy', $couriers->id) }}" method="post">
        @csrf
        @method('delete')
      </form>
    </td>
  </tr>
  @endforeach
</tbody>
</tfoot>
</table>
<div class="container"> 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">    
      <div class="modal-content">
        <div class="modal-header">
         <h4>Add New</h4>
       </div>
       <div class="modal-body">
         <div class="row">
          <div class="col sm-12">
            <label >From</label>
            <input  id="from1" type="text" class="form-control"  placeholder="form" />
          </div></div>
          <div class="row">
            <div class="col sm-12">
              <label>To</label>
              <input id="to1"  type="text" class="form-control" placeholder="To"> 
            </div></div>
            <div class="row">
              <div class="col sm-12">
                <label>Received By</label>
                <input id="received_by" type="text" class="form-control" placeholder="Received By" />
              </div>
            </div>  
          </div>
          <div class="modal-footer">
            <button  id="submitInward"class="btn btn-primary" data-dismiss="modal">Submit</button>
            <!--<a href="#!"   id="submitInward" class="modal-close waves-effect waves-green btn-flat">Submit</a>-->
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @push('scripts')
  <script>
    $(document).ready(function() {
   // $('.modal fade').modal();
   $('#submitInward').on('click', function(){
     var to = $('#to1').val();
     var from = $('#from1').val();
     var received_by = $('#received_by').val();
     var description = $('#description').val();
     $.post( "/couriers", {
      '_token': "{{ csrf_token() }}", 
      'to':to,
      'from':from,
      'received_by':received_by, 
      'description':description,     
      'type': 'inward'
    }, 
    function(data){
     console.log(data);
     location.reload();
     $('#to1').val('');
     $('#from1').val('');
     $('#received_by').val('');

   }); 
   });

   // $('#example').DataTable( {
//columnDefs: [
     // {
       // targets: [ 0, 1, 2 ],
       // className: 'mdl-data-table__cell--non-numeric'
      //}
     // ]
    //} );
  // } );
//$(document).ready(function() {
  $('#example').DataTable( {
   colReorder: true
 } );
} );
</script>
@endpush