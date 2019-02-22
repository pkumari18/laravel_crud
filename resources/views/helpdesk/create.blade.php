@extends('layout')

@section('title', 'Open Ticket')

@section('content')
<style>
.uper {
  margin-top: 40px;
}
th{
  color: green;
}

.uper {
  margin-top: 40px;
}

</style>
<h2 style=" color: #ff1a1a;"><b>Tickets</b></h2>
<!-- <div class="tab">
  <button class="tablinks" onclick="openEmp(event, 'emp_id')">My Tickets</button>
  <button class="tablinks" onclick="openEmp(event, 'basics')">All Tickets</button>
</div> -->

<div class="pull-right">
 
  <a href="{{ route('dashboard.index') }}">Back</a>
</div>

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Open New Ticket</div>

      <div class="panel-body">
        
       @include('includes.flash')
       <div id = "myTabContent" class = "tab-content">

         <div class = "tab-pane fade in active" id = "home">
           <div class="card uper">
            <div class="card-body">
              

             <div class="bs-example">
               
              <div class="row">
                <div class="container">
                  
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/new_ticket') }}">
                  {!! csrf_field() !!}

                  <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="col-md-4 control-label">Type</label>
                    <div class="col-md-6">
                      <select id="type" type="" class="form-control" name="type">
                        <option value="">Select Type</option>
                        <option value="it">It</option>
                        <option value="admin">Admin</option>
                      </select>
                      @if ($errors->has('type'))
                      <span class="help-block">
                        <strong>{{ $errors->first('type') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('issues') ? ' has-error' : '' }}">
                    <label for="issues" class="col-md-4 control-label">Issues</label>

                    <div class="col-md-6">
                      <select id="issues" type="" class="form-control" name="issues">
                        <option value="">Select Issues</option>
                      </select>

                      @if ($errors->has('issues'))
                      <span class="help-block">
                        <strong>{{ $errors->first('issues') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  
                  

                  <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                    <label for="priority" class="col-md-4 control-label">Priority</label>

                    <div class="col-md-6">
                      <select id="priority" type="" class="form-control" name="priority">
                        <option value="">Select Priority</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                      </select>

                      @if ($errors->has('priority'))
                      <span class="help-block">
                        <strong>{{ $errors->first('priority') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="message" class="col-md-4 control-label">Description</label>

                    <div class="col-md-6">
                      <textarea rows="10" id="message" class="form-control" name="message"></textarea>

                      @if ($errors->has('message'))
                      <span class="help-block">
                        <strong>{{ $errors->first('message') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-ticket"></i> Open Ticket
                      </button>
                    </div>
                  </div>
                </form>
                

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection


