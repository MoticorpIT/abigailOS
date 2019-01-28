@extends('layouts.app')

@section('content')
Invoices - show.blade.php
<hr>
Invoice Number: {{ $invoice->invoice_num }} <br>
Due Date: {{ $invoice->due_date }} <br>
Repeats (y/n): {{ $invoice->repeats }} <br>
Amount Due: {{ $invoice->amount_due }} <br>
Balance: {{ $invoice->balance }} <br>
Contract Id: {{ $invoice->contract->tenant->last_name }}/{{ $invoice->contract->asset->name }} <br>
Priority Id: {{ $invoice->priority->name }} <br>
Status Id: {{ $invoice->status->name }}
<hr>
<a href="/invoices/{{$invoice->id}}/edit">Edit Invoice</a>

@endsection