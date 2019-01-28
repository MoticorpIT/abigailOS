@extends('layouts.app')

@section('content')
	Contracts - index.blade.php
	<hr>
	<p>This page will not exsist in the production version. To view contracts, visit assets and/or tenants. Leaving it here for now because contract.store and contract.update are currently redirecting here. Once the redirect location is determined, this page/route will be gone</p>
	<hr>
	@foreach($contracts as $contract)
		{{ $contract->id }}
		<a href="contracts/{{ $contract->id }}/edit">Edit contract</a>
		<a href="contracts/{{ $contract->id }}">Show contract</a><br />
	@endforeach
	<a href="contracts/create">Create contract</a>
@endsection

