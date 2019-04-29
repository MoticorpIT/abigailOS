@extends('layouts.app')

@section('content')

<h1>Create a New Invoice</h1>

<form method="POST" action="{{ route('invoices.store') }}">
	@csrf @include('layouts.errors')

	<div class="form-group">
		<label>Invoice Number</label>
		<div class="input-group">
			<input type="text" class="form-control" name="invoice_num" placeholder="This should auto fill/increment" value="{{ old('invoice_num') }}">
		</div>
	</div>

	<div class="form-group">
		<label>Due Date</label>
		<div class="input-group">
			<input type="date" class="form-control {{ $errors->has('due_date') ? 'has-error' : '' }}" name="due_date" value="{{ old('due_date') }}">
			<div class="input-group-append">
				<div class="input-group-text">
					<i class="fas fa-calendar-alt"></i>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label>Repeats</label>
		<select class="form-control" name="repeats">
	        <option value="1" {{ old('repeates') == 1 ? 'selected' : '' }}>Yes</option>
	        <option value="0" selected>No</option>
	    </select>
	</div>

	<div class="form-group">
		<label>Amount Due</label>
		<div class="input-group">
			<input type="text" class="form-control" name="amount_due" placeholder="How much is due?" value="{{ old('amount_due') }}">
		</div>
	</div>

	<div class="form-group">
		<label>Balance</label>
		<div class="input-group">
			<input type="text" class="form-control" name="balance" placeholder="What's the remaining balance?" value="{{ old('balance') }}">
		</div>
	</div>

	<div class="form-group">
		<label>
			Contract
		</label>
		<select class="form-control" name="contract_id">
			<option value="" selected>Choose One</option>
			@foreach ($contracts as $contract)
				<option value="{{$contract->id}}" {{ old('contract_id') == $contract->id ? 'selected' : '' }}>{{ $contract->tenant->last_name }}/{{ $contract->asset->name }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Prioritiy
		</label>
		<select class="form-control" name="priority_id">
			<option value="" selected>Choose One</option>
			@foreach ($priorities as $key => $value)
				<option value="{{$key}}" {{ old('priority_id') == $key ? 'selected' : '' }}>{{ $value }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Invoice Status
		</label>
		<select class="form-control" id="status_id" name="status_id">
			<option value="1" selected>Active</option>
		</select>
	</div>

	<hr>
	
	<button id="submit-btn" type="submit" class="btn btn-primary">
		Save Contract
	</button>

</form>
@endsection