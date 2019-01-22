@extends('layouts.app')

@section('content')
	Payments - index.blade.php
	<hr>
	@foreach($payments as $payment)
		<strong>Id:</strong>{{ $payment->id }}
		<strong>Amount Paid:</strong> {{ $payment->amount_paid }}
		<strong>Method:</strong>{{ $payment->method }}
		<strong>Check Num:</strong> {{ $payment->check_num }}
		<strong>Invoice Id:</strong> {{ $payment->invoice_id }}
		<a href="/payments/{{ $payment->id }}/edit">Edit payment</a>
		<a href="/payments/{{ $payment->id }}">Show payment</a><br />
	@endforeach
	<a href="/payments/create">Create Payment</a>
@endsection