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
</div><br/>
@endif
<div class="form-group">
  <div class="row">
    <div class="col sm-12">  
     <h4><b>OUTWARD COURIERS</b></h4>
     <a href="{{ route('couriers.index') }}" class="btn btn-primary">Back</a>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
   </div>
 </div></div>
 <table id="example" class="table table-striped table-bordered" style="width:100%">
   <thead> 
    <tr>
      <th>ID</th>
      <th>Form</th>
      <th>To</th>
      <th>Posted By</th>
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
     <td>{{$couriers->posted_by}}</td>
     <td>{{$couriers->description}}</td>
     <td>{{$couriers->created_at}}</td>
     <td>
      <a href="{{ route('couriers.show', $couriers->id)}}"><i class="glyphicon glyphicon-eye-open"></i></a>
      <a  href="{{ route('couriers.edit', $couriers->id) }}"><i class="glyphicon glyphicon-pencil"></i></a>
      <a href="" 
      onClick="event.preventDefault(); 
      if(confirm('Are you sure?')) {
      document.getElementById('outwardDelete-{{$couriers->id}}').submit();
    }
    ">
    <i class="glyphicon glyphicon-trash"></i>
  </a>
  <form id="outwardDelete-{{ $couriers->id }}" action="{{ route('couriers.destroy',$couriers->id) }}" method="post">
    @csrf
    @method('delete')
  </form>
</td>
</tr>
@endforeach
</tbody>
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
            <input  id="from2" type="text" class="form-control"  placeholder="form" />
          </div></div>
          <div class="row">
            <div class="col sm-12">
              <label>To</label>
              <input id="to2"  type="text" class="form-control" placeholder="To"> 
            </div></div>
            <div class="row">
              <div class="col sm-12">
                <label>Posted By</label>
                <input id="posted_by" type="text" class="form-control" placeholder="Posted By" />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button  id="submitOutward" class="btn btn-primary" data-dismiss="modal">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @push('scripts')
  <script>
   $(document).ready(function() {
  //$('.modal').modal();
  $('#submitOutward').on('click', function(){
    var from = $('#from2').val();
    var to = $('#to2').val();
    var posted_by = $('#posted_by').val();
    $.post( "/couriers", {
      '_token': "{{ csrf_token() }}", 
      'to':to,
      'from':from,
      'posted_by':posted_by,
      'type': 'outward'
    }, 
    function(data){
      console.log(data);
      location.reload();
      $('#from2').val('');
      $('#to2').val('');
      $('#posted_by').val('');

    }); 
  });
  $('#example').DataTable( {
   colReorder: true
 } );
} );
</script>
@endpush