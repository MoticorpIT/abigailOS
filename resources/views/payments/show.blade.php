@extends('layouts.app')

@section('content')
<h2>Payment (show)</h2>
ID: {{ $payment->id }}<br>
Amount Paid: {{ cleanMoneyWithCents($payment->amount_paid) }}<br>
Payment Method: {{ $payment->method }}<br>
Check Number (nullable): {{ $payment->check_num }}<br>
Invoice ID: {{ $payment->invoice_id }}
<hr>
<h3>Invoice</h3>
Invoice Number: {{ $payment->invoice->invoice_num }}<br>
Invoice Due Date: {{ cleanDate($payment->invoice->due_date) }}<br>
Invoice Amount Due: {{ cleanMoneyWithCents($payment->invoice->amount_due) }}<br>
Invoice Balance Due: {{ cleanMoneyWithCents($payment->invoice->balance) }}
@endsection