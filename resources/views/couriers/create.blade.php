@extends('layout')

@section('title', 'Courier Management')

@section('content')

<form action="{{ route('couriers.store') }}" method="post">
  @csrf
  <p class="center-align">COURIER  MANGEMENT</p>

  <div class="row">
    <div class="input-field col s6">
      <textarea name="from" class="materialize-textarea"></textarea>
      <label for="input_text">From</label>
    </div>
    <div class="input-field col s6">
     <textarea name="to" class="materialize-textarea"></textarea>
     <label for="textarea1">To</label>
   </div>
 </div>
 <div class="row">
  <div class="input-field col s6">
    <textarea name="received_by" class="materialize-textarea"></textarea>
    <label for="textarea1">Received By</label>
  </div>
  
  <div class="input-field col s6">
    <textarea name="handover_to" class="materialize-textarea"></textarea>
    <label for="textarea1">Handover To</label>
  </div>
  <div class="row">
   <center><div class="input-field col s12">
    <button type="submit" class="btn waves-effect waves-light">Submit
    </button></center> 
  </div>
</div> 
</form></center>
@endsection
