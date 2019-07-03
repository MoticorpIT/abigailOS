@extends('layouts.app')

@section('content')

	<div class="db-boxes-row row no-gutters">
		<div class="col-12">
			<div class="lowerlevel db-box">
				<h1 class="page-heading">
					<i class="fas fa-dollar-sign"></i> Payments
					<a href="{{ route('payments.create') }}" class="btn btn-primary d-block-small float-right">
						<i class="fas fa-plus-square"></i>
						Create Payment
					</a>
				</h1>

				<div class="tenant-table-wrapper table-wrapper table-responsive">
					<table class="tenant-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
						<thead>
							<tr>
								<th class="created-on">
									Date
								</th>
								<th class="invoice-id">
									Invoice
								</th>
								<th class="payment-method">
									Method
								</th>
								<th class="check-num">
									Check Number
								</th>
								<th class="amount-paid">
									Amount
								</th>
								<th class="view-button not-mobile-p">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($payments as $payment)
								<tr class="status-{{ $payment->status_id }}">
									<td class="id all">
										{{ cleanDate($payment->created_at) }}
									</td>
									<td class="invoice-id">
										{{ $payment->invoice->invoice_num }}
									</td>
									<td class="payment-method">
										{{ $payment->method }}
									</td>
									<td class="check-num">
										{{ $payment->check_num }}
									</td>
									<td class="amount-paid">
										{{ cleanMoneyWithCents($payment->amount_paid) }}
									</td>
									<td class="view-button not-mobile-p">
										<a href="{{ route('payments.show', $payment) }}" class="btn btn-secondary btn-sm view-link">
											<i class="fas fa-eye"></i>
										</a>
										<a href="{{ route('payments.edit', $payment) }}" class="btn btn-secondary btn-sm view-link">
											<i class="fas fa-pencil-alt"></i>
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
