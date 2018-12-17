@extends('layouts.app')

@section('content')
	Assets - show.blade.php || <a href="assets/create">Create asset</a>
	<hr>
	<h4>Asset Profile</h4>
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
		<li>asset_type: {{ $asset->assetType->name }}</li>
		<li>company: {{ $asset->company->name }}</li>
		<li>status: {{ $asset->status->name }}</li>
		<li>created_at: {{ $asset->created_at }}</li>
		<li>updated_at: {{ $asset->updated_at }}</li>
		<li><a href="assets/{{ $asset->id }}/edit">Edit asset</a></li>
		<li><a href="/assets">View all assets</a></li>
	</ul>
	<hr>
	<h4>Accounts (associated)</h4>
	@foreach($accounts as $account)
		<ul>
			<li>id: {{ $account->id }}</li>
			<li>name: {{ $account->name }}</li>
			<li>created_at: {{ $account->created_at }}</li>
			<li>updated_at: {{ $account->updated_at }}</li>
		</ul>
	@endforeach
	<hr>
	<h4>Notes (associated)</h4>
	@foreach($notes as $note)
		<ul>
			<li>id: {{ $note->id }}</li>
			<li>note: {{ $note->note }}</li>
			<li>user: {{ $note->user->name }}</li>
			<li>created_at: {{ $note->created_at }}</li>
			<li>updated_at: {{ $note->updated_at }}</li>
		</ul>
	@endforeach
	<hr>
	<h4>Contracts (associated)</h4>
	@foreach($contracts as $contract)
		<ul>
			<li>id: {{ $contract->id }}</li>
			<li>tenant: {{ $contract->tenant->last_name }}, {{ $contract->tenant->first_name }}</li>
			<li>created_at: {{ $contract->created_at }}</li>
			<li>updated_at: {{ $contract->updated_at }}</li>
		</ul>
	@endforeach
@endsection

