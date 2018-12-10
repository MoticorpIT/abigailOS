@extends('layouts.app')

@section('content')
	Invoices - index.blade.php
	<hr>
	@foreach($invoices as $invoice)
		{{ $invoice->invoice_num }}
		<a href="invoices/{{ $invoice->id }}/edit">Edit invoice</a>
		<a href="invoices/{{ $invoice->id }}">Show invoice</a><br />
	@endforeach
	<a href="invoices/create">Create Invoice</a>
@endsection