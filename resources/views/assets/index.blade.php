@extends('layouts.app')

@section('content')
	Assets - index.blade.php
	<hr>
	<a href="assets/create">Create asset</a>
	@foreach($assets as $asset)
		<ul>
			<li>id: {{ $asset->id }}</li>
			<li>name: {{ $asset->name }}</li>
			<li>street_1: {{ $asset->street_1 }}</li>
			<li>street_2: {{ $asset->street_2 }}</li>
			<li>city: {{ $asset->city }}</li>
			<li>state: {{ $asset->state }}</li>
			<li>zip: {{ $asset->zip }}</li>
			<li>phone_1: {{ $asset->phone_1 }}</li>
			<li>phone_2: {{ $asset->phone_2 }}</li>
			<li>fax: {{ $asset->fax }}</li>
			<li>email: {{ $asset->email }}</li>
			<li>rent: {{ $asset->rent }}</li>
			<li>deposit: {{ $asset->deposit }}</li>
			<li>asset_type_id: {{ $asset->asset_type_id }}</li>
			<li>company_id: {{ $asset->company_id }}</li>
			<li>status_id: {{ $asset->status_id }}</li>
			<li>created_at: {{ $asset->created_at }}</li>
			<li>updated_at: {{ $asset->updated_at }}</li>
			<li><a href="assets/{{ $asset->id }}/edit">Edit asset</a></li>
			<li><a href="assets/{{ $asset->id }}">Show asset</a></li>
		</ul>
	@endforeach
@endsection

