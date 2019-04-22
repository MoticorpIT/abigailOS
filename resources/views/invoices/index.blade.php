@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters mb-3">
	<div class="col-12">
		<div class="lowerlevel db-box">
			<h1 class="page-heading">
				<i class="fas fa-exclamation-circle"></i> Invoices
				<a href="{{ route('invoices.create') }}" class="btn btn-primary d-block-small float-right">
					<i class="fas fa-exclamation-circle"></i>
					Create Invoice
				</a>
			</h1>

			<div class="asset-table-wrapper table-wrapper table-responsive">
				<table class="asset-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
					<thead>
						<tr>
							<th class="text-left">Invoice #</th>
							<th class="text-left">Due Date</th>
							<th class="text-left">Repeats</th>
							<th class="text-left">Due</th>
							<th class="text-left">Balance</th>
							<th class="text-left">Contract</th>
							<th class="text-left">Status</th>
							<th class="view-button text-left not-mobile-p">
								View
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($invoices as $invoice)
							<tr>
								<td class="text-left">{{ $invoice->invoice_num }}</td>
								<td class="text-left">{{ cleanDate($invoice->due_date) }}</td>
								<td class="text-left">{{ $invoice->repeats }}</td>
								<td class="text-left">{{ cleanMoneyWithCents($invoice->amount_due) }}</td>
								<td class="text-left">{{ cleanMoneyWithCents($invoice->balance) }}</td>
								<td class="text-left">{{ $invoice->contract->tenant->last_name }}/{{ $invoice->contract->asset->name }}</td>
								<td class="text-left">{{ $invoice->status->name }}</td>
								<td class="view-button">
									<a href="{{ route('invoices.show', $invoice) }}" class="btn btn-secondary btn-sm view-link">
										<i class="fas fa-eye"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table> <!-- tenant table -->
			</div> <!-- tenant-table-wrapper -->

		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->
@endsection