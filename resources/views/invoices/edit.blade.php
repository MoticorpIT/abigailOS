@extends('layouts.app')

@section('content')
<h1>Edit an Invoice</h1>

<form method="POST" action="/invoices/{{ $invoice->id }}">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	@include('layouts.errors')

	<div class="form-group">
		<label>Invoice Number</label>
		<div class="input-group">
			<input type="text" class="form-control" name="invoice_num" placeholder="This should auto fill/increment" value="{{ $invoice->invoice_num }}">
		</div>
	</div>

	<div class="form-group">
		<label>Due Date</label>
		<div class="input-group">
			<input type="text" class="form-control" name="due_date" placeholder="When is it due?" value="{{ $invoice->due_date }}">
		</div>
	</div>

	<div class="form-group">
		<label>Repeats</label>
		<select class="form-control" name="repeats">
	        <option value="1">Yes</option>
	        <option value="0" selected>No</option>
	    </select>
	</div>

	<div class="form-group">
		<label>Amount Due</label>
		<div class="input-group">
			<input type="text" class="form-control" name="amount_due" placeholder="How much is due?" value="{{ $invoice->amount_due }}">
		</div>
	</div>

	<div class="form-group">
		<label>Balance</label>
		<div class="input-group">
			<input type="text" class="form-control" name="balance" placeholder="What's the remaining balance?" value="{{ $invoice->balance }}">
		</div>
	</div>

	<div class="form-group">
		<label>
			Contract
		</label>
		<select class="form-control" name="contract_id" value="{{ $invoice->contract_id }}">
			<option value="" selected>Choose One</option>
			@foreach ($contracts as $contract)
				<option value="{{$contract->id}}" {{ $invoice->contract_id == $contract->id ? 'selected' : '' }}>{{ $contract->tenant->last_name }}/{{ $contract->asset->name }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Prioritiy
		</label>
		<select class="form-control" name="priority_id" value="{{ $invoice->priority_id }}">
			<option value="" selected>Choose One</option>
			@foreach ($priorities as $key => $value)
				<option value="{{$key}}" {{ $invoice->priority_id == $key ? 'selected' : '' }}>{{ $value }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Invoice Status
		</label>
		<select class="form-control" id="status_id" name="status_id">
			@foreach ($statuses as $abbr => $name)
				<option value="{{$abbr}}" {{ $invoice->status_id == $abbr ? 'selected' : ''}}>{{ $name }}</option>
			@endforeach
		</select>
	</div>

	<hr>
	
	<button id="submit-btn" type="submit" class="btn btn-primary">
		Save Contract
	</button>

</form>
@endsection