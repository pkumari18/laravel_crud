@extends('layout')
@section('content')
<style>
.uper {
	margin-top: 40px;
}
</style>
<div class=" uper">
	<div class="body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><br />
		@endif
		<a href="{{route('couriers.index')}}" class="btn btn-primary">Back</a><h2 style="color: 	#00bfff">Couriers Details</h2>
		<div class="row">
			<div class="col-sm-8">
				<div class="form-group">
					<!-- <div class="col sm-2">
						<h6><b>Form:{{ $courier->from }}</b></h6>
					</div><br>
					<div class="col sm-2">
						<h6><b>To:{{ $courier->to }}</b></h6>
					</div><br>
					<div class="col sm-2">
						<h6><b>Received By:{{$courier->received_by }}</b></h6>
					</div><br>
					<div class="col sm-2">
						<h6><b>Posted By:{{ $courier->posted_by }}</b></h6>
					</div> -->
					<!-- 	<br> -->
   <!-- <table class="table">
   <thead>
     <tr>
       <th>Form</th>
       <th>To</th>
       <th>Received</th>
        <th>Posted By</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <td>{{ $courier->from }}</td>
       <td>{{$courier->to }}</td>
       <td>{{$courier->received_by }}</td>
       <td>{{$courier->posted_by }}</td>
     </tr>
     </tr>
   </tbody>
 </table> -->

 <table class="table table-striped table-bordered"> 
 	<tr>
 		<td style="width: 50px;"><b>From<b></td>
 			<td style="width: 250px;">{{$courier->from}}</td>
 		</tr>
 		<tr>
 			<td><b>To</b></td>
 			<td>{{$courier->to }}</td>
 		</tr>
 		<tr>
 			<td><b>Received By</b></td>
 			<td>{{$courier->received_by }}</td>
 		</tr>
 		<tr>
 			<td><b>Posted By</b></td>
 			<td>{{$courier->posted_by }}</td>
 		</tr>
 	</table>
 	<label for="handover_users"><h3><b>Handovers To</b></h3></label>
 	<select class="form-control" class="handover_to" id="select2">
 		@foreach ($users as $row)
 		<option value="{{ $row->id }}">{{ $row->name }}</option>
 		@endforeach
 	</select><br><br>
 	<button id="submitInwardforward" class="btn btn-primary">Forward By</button>
 </div>
</div>
<input type="hidden" id="courier_id" value="{{ $courier->id }}">
<div class="col-lg-4">
	<div class="form-group">
		<h4><b>Descriptions</b></h4>
		<textarea class="form-control" id="body" cols="30" rows="10">{{ $courier->description }}</textarea>
	</div>
	<button id="submitDesc" class="btn btn-primary">Submit</button>
</div>
</div>
</div>
</div>
<div class="row">
	<div class="col-sm-8">
		<div class="form-group">
			<h3><b>Handovers</b></h3>
			<table id="example"  class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Date of Handover</th>
					</tr>
				</thead>
				<tbody>
					@foreach($handovers as $handover)
					<tr>
						<td>{{ \App\User::where('id', $handover->user_id)->pluck('name')->first() }}</td>
						<td>{{ $handover->created_at }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
		$('#select2').select2();
		$('#submitInwardforward').on('click', function(){
			var user_id =  $('#select2').val();
			var courier_id = $('#courier_id').val();
			$.post( "/forward-couriers/"+courier_id, {'_token': "{{ csrf_token() }}", 'user_id':user_id }, function(data){
				alert(data);
			});
		});
		$('#submitDesc').on('click', function(){
			let courier_id = $('#courier_id').val();
			let body = $('#body').val();
			console.log('courier_id', courier_id);
			console.log('body', body);
			$.ajax('/couriers/'+courier_id, {
				method: 'put',
				data: {'_token': "{{ csrf_token() }}", 'courier_id':courier_id, 'description':body}, 
				success: function(data){
					alert('description updated!');
				}
			});
		});
	});
</script>
@endpush
