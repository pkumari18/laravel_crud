<option value="">Please Select</option>
@foreach($issues as $row)
	<option value="{{ $row->id }}">{{ $row->text_val }}</option>
@endforeach