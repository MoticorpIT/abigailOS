@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		Tenants - create.blade.php || <a href="/tenants/create">Create Tenant</a>
		<hr>
		<h4>Create Tenant</h4>
	</div>
	@include('layouts.errors')
	<div class="col-md-12">
		<form method="POST" action="/tenants">
			{{ csrf_field() }}
			<div class="form-group">
				<label>first name:</label>
				<input class="form-control {{ $errors->has('first_name') ? 'has-error' : '' }}" name="first_name" value="{{ old('first_name') }}" >
			</div>
			
			<div class="form-group">
				<label>last name:</label>
				<input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" name="last_name" value="{{ old('last_name') }}" >
			</div>
			
			<div class="form-group">
				<label>phone_1:</label>
				<input class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" value="{{ old('phone_1') }}" >
			</div>
			
			<div class="form-group">
				<label>phone_2:</label>
				<input class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" value="{{ old('phone_2') }}" >
			</div>
			
			<div class="form-group">
				<label>fax:</label> 
				<input class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" value="{{ old('fax') }}" >
			</div>
			
			<div class="form-group">
				<label>email:</label> 
				<input class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" value="{{ old('email') }}" >
			</div>
			
			<div class="form-group">
				<label>co_first_name:</label>
				<input class="form-control {{ $errors->has('co_first_name') ? 'has-error' : '' }}" name="co_first_name" value="{{ old('co_first_name') }}" >
			</div>
			
			<div class="form-group">
				<label>co_last_name:</label>
				<input class="form-control {{ $errors->has('co_last_name') ? 'has-error' : '' }}" name="co_last_name" value="{{ old('co_last_name') }}" >
			</div>
			
			<div class="form-group">
				<label>co_phone_1:</label>
				<input class="form-control {{ $errors->has('co_phone_1') ? 'has-error' : '' }}" name="co_phone_1" value="{{ old('co_phone_1') }}" >
			</div>
			
			<div class="form-group">
				<label>co_phone_2:</label>
				<input class="form-control {{ $errors->has('co_phone_2') ? 'has-error' : '' }}" name="co_phone_2" value="{{ old('co_phone_2') }}" >
			</div>
			
			<div class="form-group">
				<label>co_email:</label>
				<input class="form-control {{ $errors->has('co_email') ? 'has-error' : '' }}" name="co_email" value="{{ old('co_email') }}" >
			</div>
			
			<div class="form-group">
				<label>street_1:</label>
				<input class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" value="{{ old('street_1') }}" >
			</div>
			
			<div class="form-group">
				<label>street_2:</label>
				<input class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" value="{{ old('street_2') }}" >
			</div>
			
			<div class="form-group">
				<label>city:</label> 
				<input class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" value="{{ old('city') }}" >
			</div>
			
			<div class="form-group">
				<label>state:</label> 
				<input class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" value="{{ old('state') }}" >
			</div>
			
			<div class="form-group">
				<label>zip:</label> 
				<input class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" value="{{ old('zip') }}" >
			</div>{{-- 
			
			<div class="form-group">
				<label>account_standing:</label>
				<select class="form-control" id="account_standing_id" name="account_standing_id">
					@foreach($account_standings as $account_standing)
						<option value="{{ $account_standing->id }}">
							{{ $account_standing->name }}
						</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>status</label>
				<select class="form-control" id="status_id" name="status_id">
					@foreach($statuses as $status)
						<option value="{{ $status->id }}">
							{{ $status->name }}
						</option>
					@endforeach
				</select>
			</div> --}}

			<div class="form-group">
				<a href="{{ route('tenants.index') }}" class="btn btn-round">Cancel</a>
				<button id="submit-btn" type="submit" class="btn btn-primary d-block d-sm-inline">Save Tenant</button>
			</div>
		</form>
	</div>
@endsection