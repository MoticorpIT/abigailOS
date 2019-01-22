@extends('layouts.app')

@section('content')
<h2>Payment (show)</h2>
ID: {{ $payment->id }}<br>
Amount Paid: {{ $payment->amount_paid }}<br>
Payment Method: {{ $payment->method }}<br>
Check Number (nullable): {{ $payment->check_num }}<br>
Invoice ID: {{ $payment->invoice_id }}
<hr>
<h3>Invoice</h3>
{{ $payment->invoice->invoice_num }}<br>
{{ $payment->invoice->due_date }}<br>
{{ $payment->invoice->amount_due }}<br>
{{ $payment->invoice->balance }}
@endsection