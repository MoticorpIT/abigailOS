@extends('layouts.app')

@section('content')
	Assets - index.blade.php
	<hr>
	@foreach($assets as $asset)
		{{ $asset->name }}
		<a href="assets/{{ $asset->id }}/edit">Edit asset</a>
		<a href="assets/{{ $asset->id }}">Show asset</a><br />
	@endforeach
	<a href="assets/create">Create asset</a>
@endsection

