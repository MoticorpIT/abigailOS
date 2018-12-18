@extends('layouts.app')

@section('content')
<style>
.has-error { border-color: red; }
</style>

<h1>Add New Company</h1>

@include('layouts.errors')

<form method="POST" action="/companies">
	{{ csrf_field() }}
	<div class="row mb-5">
		<div class="col-md-6">
			{{-- COMPANY NAME --}}
			<div class="form-group">
				<label>Name *</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" name="name" placeholder="Name" value="{{ old('name') }}" autofocus>
			</div>
			{{-- COMPANY STREET_1 --}}
			<div class="form-group">
				<label>Street *</label>
				<input type="text" class="form-control {{ $errors->has('street_1') ? 'has-error' : '' }}" name="street_1" placeholder="Street" value="{{ old('street_1') }}">
			</div>
			{{-- COMPANY STREET_2 --}}
			<div class="form-group">
				<label>Street (optional)</label>
				<input type="text" class="form-control {{ $errors->has('street_2') ? 'has-error' : '' }}" name="street_2" placeholder="Street (optional)" value="{{ old('street_2') }}">
			</div>
			{{-- COMPANY CITY --}}
			<div class="form-group">
				<label>City *</label>
				<input type="text" class="form-control {{ $errors->has('city') ? 'has-error' : '' }}" name="city" placeholder="City" value="{{ old('city') }}">
			</div>
			{{-- COMPANY STATE --}}
			<div class="form-group">
				<label>State *</label>
				<input type="text" class="form-control {{ $errors->has('state') ? 'has-error' : '' }}" name="state" placeholder="State" value="{{ old('state') }}">
			</div>
			{{-- COMPANY ZIP --}}
			<div class="form-group">
				<label>Zip *</label>
				<input type="text" class="form-control {{ $errors->has('zip') ? 'has-error' : '' }}" name="zip" placeholder="Zip" value="{{ old('zip') }}">
			</div>
		</div>

		<div class="col-md-6">
			{{-- COMPANY PHONE_1 --}}
			<div class="form-group">
				<label>Phone *</label>
				<input type="tel" class="form-control {{ $errors->has('phone_1') ? 'has-error' : '' }}" name="phone_1" placeholder="Phone" value="{{ old('phone_1') }}">
			</div>
			{{-- COMPANY PHONE_2 --}}
			<div class="form-group">
				<label>Phone (optional)</label>
				<input type="tel" class="form-control {{ $errors->has('phone_2') ? 'has-error' : '' }}" name="phone_2" placeholder="Phone (optional)" value="{{ old('phone_2') }}">
			</div>
			{{-- COMPANY FAX --}}
			<div class="form-group">
				<label>Fax</label>
				<input type="tel" class="form-control {{ $errors->has('fax') ? 'has-error' : '' }}" name="fax" placeholder="Fax" value="{{ old('fax') }}">
			</div>
			{{-- COMPANY EMAIL --}}
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}">
			</div>
			{{-- COMPANY LOGO --}}
			<div class="form-group">
				<label>Logo - This should be an uploader</label>
				<input type="file" class="form-control {{ $errors->has('logo') ? 'has-error' : '' }}" name="logo" placeholder="Path to the Company Logo" value="{{ old('logo') }}">
			</div>
		</div>

	</div>
	<div class="row mb-5">

		<div class="col-md-6">
			{{-- COMPANY INCORP_DATE --}}
			<div class="form-group">
				<label>Incorporated Date</label>
				<input type="text" class="form-control {{ $errors->has('incorp_date') ? 'has-error' : '' }}" name="incorp_date" placeholder="Date Company was Incorporated" value="{{ old('incorp_date') }}">
			</div>
			{{-- COMPANY CORP_ID --}}
			<div class="form-group">
				<label>Corporation ID</label>
				<input type="text" class="form-control {{ $errors->has('corp_id') ? 'has-error' : '' }}" name="corp_id" placeholder="Corporation Id" value="{{ old('corp_id') }}">
			</div>
			{{-- COMPANY CITY_LIC --}}
			<div class="form-group">
				<label>City License</label>
				<input type="text" class="form-control {{ $errors->has('city_lic') ? 'has-error' : '' }}" name="city_lic" placeholder="City License" value="{{ old('city_lic') }}">
			</div>
			{{-- COMPANY COUNTY_LIC --}}
			<div class="form-group">
				<label>County License</label>
				<input type="text" class="form-control {{ $errors->has('county_lic') ? 'has-error' : '' }}" name="county_lic" placeholder="County License" value="{{ old('county_lic') }}">
			</div>
			{{-- COMPANY FED_TAX_ID --}}
			<div class="form-group">
				<label>Federal Tax Id</label>
				<input type="text" class="form-control {{ $errors->has('fed_tax_id') ? 'has-error' : '' }}" name="fed_tax_id" placeholder="Federal Tax Id" value="{{ old('fed_tax_id') }}">
			</div>
		</div>

		
		<div class="col-md-6">
			{{-- COMPANY TYPE DROPDOWN --}}
			<div class="form-group">
				<label for="company_type_id">Company Type *</label>
				<select class="form-control" id="company_type_id" name="company_type_id">
					<option value="">Choose One</option>
					@foreach($company_types as $company_type)
						<option value="{{ $company_type->id }}">{{ $company_type->name }}</option>
					@endforeach
				</select>
			</div>
			{{-- STATUS DROPDOWN --}}
			<div class="form-group">
				<label for="status_id">Company Type *</label>
				<select class="form-control" id="status_id" name="status_id">
					@foreach($statuses as $status)
						<option value="{{ $status->id }}">{{ $status->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

	</div>
	{{-- BUTTON SET --}}
	<div class="row mb-5">
		<div class="col-md-12">
			<a href="{{ route('companies.index') }}" class="btn btn-round">Cancel</a>
			<button id="submit-btn" type="submit" class="btn btn-danger btn-round">Add Company</button>
		</div>
	</div>
</form>

@endsection

