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
<a href="{{ route('category.index') }}" class="btn btn-primary">Category</a>
<a href="{{ route('location.index') }}" class="btn btn-primary">Location</a>
<a href="{{ route('item.index') }}" class="btn btn-primary">Items</a>

@endsection

