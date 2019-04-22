@extends('layouts.app')

@section('content')
<h1>Show Contract</h1>

<div class="form-group">
	<label>Deposit Amount</label>
	<div class="input-group">
		<input type="text" class="form-control" name="deposit_amount" placeholder="How much is the deposit?" value="{{ cleanMoneyWithCents($contract->deposit_amount) }}" disabled read-only>
	</div>
</div>

<div class="form-group">
	<label>Rent Amount</label>
	<div class="input-group">
		<input type="text" class="form-control" name="rent_amount" placeholder="How much is rent?" value="{{ cleanMoneyWithCents($contract->rent_amount) }}" disabled read-only>
	</div>
</div>

<div class="form-group">
	<label>Rent Due Date</label>
	<div class="input-group">
		<input type="text" class="form-control" name="rent_due_date" placeholder="Day of month rent is due" value="{{ $contract->rent_due_date }}" disabled read-only>
	</div>
</div>

<div class="form-group">
	<label>
		Term Length
	</label>
	<select class="form-control" name="term_length" disabled read-only>
        <option value="{{ $contract->term_length }}">{{ $contract->term_length }}</option>
    </select>
</div>

<div class="form-group">
	<label>Term Start Date</label>
	<div class="input-group">
		<input type="text" class="form-control" name="term_start" placeholder="When does the contract start?" value="{{ cleanDate($contract->term_start) }}" disabled read-only>
	</div>
</div>

<div class="form-group">
	<label>Term Ended</label>
	<div class="input-group">
		<input type="text" class="form-control" name="term_end" placeholder="When did the contract end?" value="{{ $contract->term_end }}" disabled read-only>
	</div>
</div>

<div class="form-group">
	<label>
		Tenant
	</label>
	<select class="form-control" name="tenant_id" value="{{ $contract->tenant_id }}" disabled read-only>
		<option selected>{{ $contract->tenant->first_name }} {{ $contract->tenant->last_name }}</option>
	</select>
</div>

<div class="form-group">
	<label>
		Asset
	</label>
	<select class="form-control" name="asset_id" value="{{ $contract->asset_id }}" disabled read-only>
		<option selected>{{ $contract->asset->name }}</option>
	</select>
</div>

<a href="{{ route('contracts.edit', $contract) }}" id="submit-btn" type="submit" class="btn">
	Edit Contract
</a>

@endsection