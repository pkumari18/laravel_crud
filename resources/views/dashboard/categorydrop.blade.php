<option value="">Please Select</option>
@foreach($category as $row)
<option value="{{ $row->id }}">{{ $row->name }}</option>
@endforeach
