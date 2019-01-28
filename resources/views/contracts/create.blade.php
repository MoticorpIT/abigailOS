@extends('layouts.app')

@section('content')
<h1>Create a New Contract</h1>

<form method="POST" action="/contracts">
	{{ csrf_field() }}
	@include('layouts.errors')

	<div class="form-group">
		<label>Deposit Amount</label>
		<div class="input-group">
			<input type="text" class="form-control" name="deposit_amount" placeholder="How much is the deposit?" value="{{ old('deposit_amount') }}">
		</div>
	</div>

	<div class="form-group">
		<label>Rent Amount</label>
		<div class="input-group">
			<input type="text" class="form-control" name="rent_amount" placeholder="How much is rent?" value="{{ old('rent_amount') }}">
		</div>
	</div>

	<div class="form-group">
		<label>Rent Due Date</label>
		<div class="input-group">
			<input type="text" class="form-control" name="rent_due_date" placeholder="Day of month rent is due" value="{{ old('rent_due_date') }}">
		</div>
	</div>

	<div class="form-group">
		<label>Term Length</label>
		<div class="input-group">
			<input type="text" class="form-control" name="term_length" placeholder="How long is the contract?" value="{{ old('term_length') }}">
		</div>
	</div>

	<div class="form-group">
		<label>Term Start Date</label>
		<div class="input-group">
			<input type="text" class="form-control" name="term_start" placeholder="When does the contract start?" value="{{ old('term_start') }}">
		</div>
	</div>

	<div class="form-group">
		<label>Term Ended</label>
		<div class="input-group">
			<input type="text" class="form-control" name="term_end" placeholder="When did the contract end?" value="{{ old('term_end') }}">
		</div>
	</div>

	<div class="form-group">
		<label>
			Tenant
		</label>
		<select class="form-control" name="tenant_id" value="{{ old('tenant_id') }}">
			<option value="" selected>Choose One</option>
			@foreach ($tenants as $tenant)
				<option value="{{$tenant->id}}">{{ $tenant->first_name }} {{ $tenant->last_name }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Asset
		</label>
		<select class="form-control" name="asset_id" value="{{ old('asset_id') }}">
			<option value="" selected>Choose One</option>
			@foreach ($assets as $asset)
				<option value="{{$asset->id}}">{{ $asset->name }}</option>
			@endforeach
		</select>
	</div>

	<button id="submit-btn" type="submit" class="btn btn-primary">
		Save Contract
	</button>

</form>

@endsection

