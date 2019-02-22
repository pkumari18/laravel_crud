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
    <form method="post" action="{{ route('couriers.update', $couriers->id) }}">
      @method('PATCH')
      @csrf
      <h3  style="color:	#00bfff"><b>EDIT INFORMATIONS</b></h3>
      <div class="row">
        <div class= "col-sm-6 col-xs-6">
          <div class="form-group">
           <label >From</label>
           <input name="from" type="text"   class="form-control"value={{ $couriers->from }} /> 
         </div></div></div>
         <div class="row">
          <div class= "col-sm-6 col-xs-6">
           <div class="form-group">
             <label>To</label>
             <input name="to" type="text" class="form-control" value={{ $couriers->to }} /> 
           </div></div></div>
           <div class="row">
             <div class= "col-sm-6 col-xs-6">
              <div class="form-group">
               <label >Received By</label>
               <input name="received_by" type="text"   class="form-control" value={{ $couriers->received_by }} /> 
             </div></div></div>
             <div class="row">
              <div class= "col-sm-6 col-xs-6">
               <div class="form-group">
                 <label>Posted By</label>
                 <input name="posted_by" type="text"  class="form-control"  value={{ $couriers->posted_by }} /> 
               </div></div></div>
               <button type="submit" class="btn btn-primary">Update</button>
             </form>
           </div>
         </div>
         @endsection

