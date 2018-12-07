@extends('layouts.app')

@section('content')
	Payments - index.blade.php
	<hr>
	@foreach($payments as $payment)
		{{ $payment->id }}
		<a href="payments/{{ $payment->id }}/edit">Edit payment</a>
		<a href="payments/{{ $payment->id }}">Show payment</a><br />
	@endforeach
	<a href="payments/create">Create Payment</a>
@endsection