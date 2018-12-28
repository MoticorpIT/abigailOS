@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		Tenants - edit.blade.php || <a href="/tenants/create">Create Tenant</a>
		<hr>
		<h4>Edit Tenant Profile</h4>
	</div>
	@include('layouts.errors')
	<div class="col-md-12">
		<form method="POST" action="/tenants/{{ $tenant->id }}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<label>first name:</label>
				<input type="tel" class="form-control {{ $errors->has('first_name') ? 'has-error' : '' }}" name="first_name" value="{{ $tenant->first_name }}" >
			</div>
			
			<div class="form-group">
				<label>last name:</label>
				<input type="tel" class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="last_name" value="{{ $tenant->last_name }}" >
			</div>
			
			<div class="form-group">
				<label>phone_1:</label>
				<input type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" value="{{ $tenant->phone_1 }}" >
			</div>
			
			<div class="form-group">
				<label>phone_2:</label>
				<input type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" value="{{ $tenant->phone_2 }}" >
			</div>
			
			<div class="form-group">
				<label>fax:</label> 
				<input type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" value="{{ $tenant->fax }}" >
			</div>
			
			<div class="form-group">
				<label>email:</label> 
				<input type="tel" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" value="{{ $tenant->email }}" >
			</div>
			
			<div class="form-group">
				<label>co_first_name:</label>
				<input type="tel" class="form-control {{ $errors->has('co_first_name') ? 'has-error' : '' }}" name="co_first_name" value="{{ $tenant->co_first_name }}" >
			</div>
			
			<div class="form-group">
				<label>co_last_name:</label>
				<input type="tel" class="form-control {{ $errors->has('co_last_name') ? 'has-error' : '' }}" name="co_last_name" value="{{ $tenant->co_last_name }}" >
			</div>
			
			<div class="form-group">
				<label>co_phone_1:</label>
				<input type="tel" class="form-control {{ $errors->has('co_phone_1') ? 'has-error' : '' }}" name="co_phone_1" value="{{ $tenant->co_phone_1 }}" >
			</div>
			
			<div class="form-group">
				<label>co_phone_2:</label>
				<input type="tel" class="form-control {{ $errors->has('co_phone_2') ? 'has-error' : '' }}" name="co_phone_2" value="{{ $tenant->co_phone_2 }}" >
			</div>
			
			<div class="form-group">
				<label>co_email:</label>
				<input type="tel" class="form-control {{ $errors->has('co_email') ? 'has-error' : '' }}" name="co_email" value="{{ $tenant->co_email }}" >
			</div>
			
			<div class="form-group">
				<label>street_1:</label>
				<input type="tel" class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" value="{{ $tenant->street_1 }}" >
			</div>
			
			<div class="form-group">
				<label>street_2:</label>
				<input type="tel" class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" value="{{ $tenant->street_2 }}" >
			</div>
			
			<div class="form-group">
				<label>city:</label> 
				<input type="tel" class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" value="{{ $tenant->city }}" >
			</div>
			
			<div class="form-group">
				<label>state:</label> 
				<input type="tel" class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ $tenant->state }}" >
			</div>
			
			<div class="form-group">
				<label>zip:</label> 
				<input type="tel" class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" value="{{ $tenant->zip }}" >
			</div>
			
			<div class="form-group">
				<label>account_standing:</label>
				<select class="form-control" id="account_standing_id" name="account_standing_id">
					@foreach($account_standings as $account_standing)
						<option value="{{ $account_standing->id }}" {{ $account_standing->id == $account_standing->account_standing_id ? 'selected' : '' }}>
							{{ $account_standing->name }}
						</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>status</label>
				<select class="form-control" id="status_id" name="status_id">
					@foreach($statuses as $status)
						<option value="{{ $status->id }}" {{ $status->id == $status->status_id ? 'selected' : '' }}>
							{{ $status->name }}
						</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<a href="{{ route('tenants.index') }}" class="btn btn-round">Cancel</a>
				<button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">Save Tenant</button>
			</div>
		</form>
	</div>
@endsection