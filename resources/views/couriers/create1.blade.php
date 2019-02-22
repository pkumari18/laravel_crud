@extends('layout')

@section('title', 'Courier Management')

@section('content')

<form action="{{ route('couriers.store') }}" method="post">
  @csrf
  <p class="center-align">COURIER  MANGEMENT</p>

  <div class="row">
    
    <div class="input-field col s6">
      <input name="to" type="text">
      <label for="textarea1">To</label>
    </div>
    <div class="input-field col s6">
      <input name="from" type="text" >
      <label for="input_text">From</label>
    </div>


  </div>
  <div class="row">
    <div class="input-field col s6">
      <textarea name="posted_by" class="materialize-textarea"></textarea>
      <label for="textarea1">Posted By</label>
    </div>
    
    <div class="row">
     <center><div class="input-field col s12">
      <button type="submit" class="btn waves-effect waves-light">Submit
      </button></center> 
    </div>
  </div> 
</form>
@endsection
