@extends('layouts.vali')
@section('content')


<!-- <div class="col sm-6"  style="margin-top: 100px;">
			<div class="card-body">
				<br><br><br>
		<center>	<a class="btn btn-lg btn-primary" href="{{ route('couriers.list-couriers', 'inward' )}}">Inward Couriers</a>
		      </div>
        </div> -->
		<!-- <div class="col sm-6"style="margin-top: 100px;">
			<div class="card-body">
				<br><br><br>
			<a  class="btn btn-lg btn-primary" href="{{ route('couriers.list-couriers', 'outward' )}}">Outward Couriers</a></center>
		      </div>
		
       -->

       


       
<!-- <div class="col-md-4">
  <div class="column">
    <center>       
       <div class="card" style="background-color: 	#20afdf;">
        <br>
      
      <center>	<h1><a class="btn btn-lg btn-primary" href="{{ route('couriers.list-couriers', 'inward' )}}" style="background-color: #20afdf;">Inward Couriers</a> </center></h1>
       <h1 id="dailySales"></h1>
     
      </div>
    
  </div>
</div> -->

<div class="col-md-6" style="margin-top: 150px;">
  <div class="column">     
   <div class="card">
    
    <div class="card" style="background-color: 	#20afdf;">
      <h1><a href="{{ route('couriers.list-couriers','inward' )}}"  style="color: #ffffff; margin-left: 100px;">Inward Couriers</a></h1>
      <br>
    </div>
  </div>
  <div class="card" style="height: 350px;">
  </div>
</div></div>
<div class="col-md-6" style="margin-top: 150px;">
  <div class="column">   
   <div class="card">
    
    <div class="card" style="background-color: 	#20afdf;"><h1><a href="{{ route('couriers.list-couriers', 'outward' )}}"  style="color: #ffffff; margin-left: 100px">Outward Couriers</a></h1>   <br>
    </div>
  </div>
  <div class="card" style="height: 350px;">
  </div>
</div></div>
@endsection