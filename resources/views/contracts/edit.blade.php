@extends('layouts.app')

@section('content')
<h1>Edit a Contract</h1>

<form method="POST" action="/contracts/{{ $contract->id }}">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('layouts.errors')

	<div class="form-group">
		<label>Deposit Amount</label>
		<div class="input-group">
			<input type="text" class="form-control" name="deposit_amount" placeholder="How much is the deposit?" value="{{ $contract->deposit_amount }}">
		</div>
	</div>

	<div class="form-group">
		<label>Rent Amount</label>
		<div class="input-group">
			<input type="text" class="form-control" name="rent_amount" placeholder="How much is rent?" value="{{ $contract->rent_amount }}">
		</div>
	</div>

	<div class="form-group">
		<label>Rent Due Date</label>
		<div class="input-group">
			<input type="text" class="form-control" name="rent_due_date" placeholder="Day of month rent is due" value="{{ $contract->rent_due_date }}">
		</div>
	</div>

	<div class="form-group">
		<label>Term Length</label>
		<div class="input-group">
			<input type="text" class="form-control" name="term_length" placeholder="How long is the contract?" value="{{ $contract->term_length }}">
		</div>
	</div>

	<div class="form-group">
		<label>Term Start Date</label>
		<div class="input-group">
			<input type="text" class="form-control" name="term_start" placeholder="When does the contract start?" value="{{ $contract->term_start }}">
		</div>
	</div>

	<div class="form-group">
		<label>Term Ended</label>
		<div class="input-group">
			<input type="text" class="form-control" name="term_end" placeholder="When did the contract end?" value="{{ $contract->term_end }}">
		</div>
	</div>

	<div class="form-group">
		<label>
			Tenant
		</label>
		<select class="form-control" name="tenant_id">
			@foreach ($tenants as $tenant)
				<option value="{{ $tenant->id }}" {{ $contract->tenant_id == $tenant->id ? 'selected' : '' }}>
					{{ $tenant->first_name }} {{ $tenant->last_name }}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Asset
		</label>
		<select class="form-control" name="asset_id"">
			<option value="" selected>Choose One</option>
			@foreach ($assets as $asset)
				<option value="{{ $asset->id }}" {{ $contract->asset_id == $asset->id ? 'selected' : '' }}>
					{{ $asset->name }}
				</option>
			@endforeach
		</select>
	</div>

	<button id="submit-btn" type="submit" class="btn btn-primary">
		Save Contract
	</button>

</form>
@endsection

