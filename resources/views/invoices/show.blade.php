@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
	<div class="col-12">
		<div class="lowerlevel db-box">

			<nav aria-label="breadcrumb" class="d-none d-sm-block">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="/dashboard/">
							Dashboard
						</a>
					</li>
					<li class="breadcrumb-item">
						<a href="/invoices">
							Invoice Table
						</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						Invoice <span class="d-none d-sm-inline">#{{$invoice->invoice_num}}</span>
					</li>
				</ol>
			</nav>

			<h1 class="page-heading">
				<i class="fas fa-file-invoice"></i> Invoice

				{{-- BUTTON SET --}}
				<div class="float-right button-set">
					<a href="/invoices" class="btn btn-round">Go Back</a>
					<a href="javascript:window.print()" class="btn btn-secondary">
						<i class="fas fa-print"></i>
						Print Invoice
					</a>
					<a href="/invoices/{{ $invoice->id }}/edit" class="btn btn-primary">
						<i class="fas fa-edit"></i>
						Edit Invoice
					</a>
				</div>
				<div class="clear"></div>
			</h1>

			<div class="invoice-wrapper">

				<section class="invoice-head">
					<div class="row">
						<div class="col-12 col-md-6 col company-info-col">
							<div class="company-info">
								<address itemscope itemprop="address" itemtype="http://schema.org/PostalAddress">
									<div class="logo">
										<img src="https://placehold.it/200x100"/>
									</div>
									<div class="company-details">
										<div class="company-details-content">
											<h2 class="company-name" itemprop="name">{{ $invoice->contract->asset->company->name }}</h2>
											<span class="street" itemprop="streetAddress">
												{{ $invoice->contract->asset->company->street_1 }}
												@if($invoice->contract->asset->company->street_2)
													<br>{{ $invoice->contract->asset->company->street_2 }}</span>
												@endif
											<br />
											<span class="city" itemprop="addressLocality">{{ $invoice->contract->asset->company->city }}</span>,
											<span class="state" itemprop="addressRegion">{{ $invoice->contract->asset->company->state }}</span>
											<span class="zip" itemprop="postalCode">{{ $invoice->contract->asset->company->zip }}</span>
										</div> <!-- company details conent -->
									</div> <!-- company details -->
								</address>
							</div> <!-- company-info -->
						</div> <!-- col -->
						<div class="col-12 col-md-6 col invoice-info-col">
							<div class="invoice-info">
								<h1 class="title">Invoice</h1>
								<div class="invoice-details">
									<div class="form-group statement-date">
										<label for="statement-date">Statement Date:</label>
										<input class="form-control" type="text" name="statement-date" disabled readonly value="11/6/88" />
									</div> <!-- form group -->
									<div class="form-group customer-id">
										<label for="invoice-id">Invoice ID:</label>
										<input class="form-control" type="text" name="invoice-id" disabled readonly value="{{ $invoice->invoice_num }}" />
									</div> <!-- form group -->
								</div> <!-- invoice-details -->
							</div> <!-- invoice-info -->
						</div> <!-- col -->
					</div> <!-- row -->
				</section> <!-- invoice-head -->

				<section class="invoice-addressee">
					<div class="row">
						<div class="col-12 col-md-4 col">
							<div class="addressee-info">
								<h3 class="title">Bill To:</h3>
								<address itemscope itemprop="address" itemtype="http://schema.org/PostalAddress">
									<h4 class="name" itemprop="name">{{ $invoice->contract->tenant->first_name }} {{ $invoice->contract->tenant->last_name }}</h4>
									<span class="street" itemprop="streetAddress">
										{{ $invoice->contract->tenant->street_1 }}
										@if($invoice->contract->tenant->street_2)
											<br>{{ $invoice->contract->tenant->street_2 }}</span>
										@endif
									<br />
									<span class="city" itemprop="addressLocality">{{ $invoice->contract->tenant->city }}</span>,
									<span class="state" itemprop="addressRegion">{{ $invoice->contract->tenant->state }}</span>
									<span class="zip" itemprop="postalCode">{{ $invoice->contract->tenant->zip }}</span>
								</address>
							</div> <!-- addressee-info -->
						</div> <!-- col -->
						<div class="col-12 col-md-4 col">
							<div class="property-info">
								<h3 class="title">Property Address:</h3>
								<address itemscope itemprop="address" itemtype="http://schema.org/PostalAddress">
									<span class="street" itemprop="streetAddress">
										{{ $invoice->contract->asset->street_1 }}
										@if($invoice->contract->asset->street_2)
											<br>{{ $invoice->contract->asset->street_2 }}</span>
										@endif
									<br />
									<span class="city" itemprop="addressLocality">{{ $invoice->contract->asset->city}}</span>,
									<span class="state" itemprop="addressRegion">{{ $invoice->contract->asset->state }}</span>
									<span class="zip" itemprop="postalCode">{{ $invoice->contract->asset->zip }}</span>
								</address>
							</div> <!-- property-info -->
						</div> <!-- col -->
						<div class="col-12 col-md-4 col">
							<div class="balance-info">
								<h3 class="title">Amount Due:</h3>
								<div class="balance-details">
									<input class="form-control balance-due" type="text" name="balance-due" disabled readonly value="{{ cleanMoneyWithCents($invoice->amount_due) }}" />
									<div class="form-group due-date">
										<label for="due-date">Due Date:</label>
										<input class="form-control" type="text" name="due-date" disabled readonly value="{{ $invoice->due_date }}" />
									</div> <!-- form group -->
								</div> <!-- balance details -->
							</div> <!-- property-info -->
						</div> <!-- col -->
					</div> <!-- row -->
				</section> <!-- invoice addressee -->

				<section class="account-activity">
					<div class="row">
						<div class="col-12">
							<h3 class="title">Account Activity</h3>
							<table class="activity-table themed-table table table-striped table-bordered">
								<thead>
									<tr>
										<th class="date">Date</th>
										<th class="ref">REF</th>
										<th class="description">Description</th>
										<th class="amount">Amount</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="date">7/8/19</td>
										<td class="ref">Chk 412</td>
										<td class="description">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</td>
										<td class="amount">$2,345.56</td>
									</tr>
									<tr>
										<td class="date">7/8/19</td>
										<td class="ref">Chk 412</td>
										<td class="description">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</td>
										<td class="amount">$2,345.56</td>
									</tr>
									<tr>
										<td class="date">7/8/19</td>
										<td class="ref">Chk 412</td>
										<td class="description">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</td>
										<td class="amount">$2,345.56</td>
									</tr>
									<tr>
										<td class="date">7/8/19</td>
										<td class="ref">Chk 412</td>
										<td class="description">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</td>
										<td class="amount">$2,345.56</td>
									</tr>
									<tr>
										<td class="date">7/8/19</td>
										<td class="ref">Chk 412</td>
										<td class="description">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</td>
										<td class="amount">$2,345.56</td>
									</tr>
									<tr>
										<td class="date">7/8/19</td>
										<td class="ref">Chk 412</td>
										<td class="description">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</td>
										<td class="amount">$2,345.56</td>
									</tr>
								</tbody>
							</table>
							<div class="total-detail">
								<h4 class="title">Balance Due: <span>{{ cleanMoneyWithCents($invoice->amount_due) }}</span></h4>
							</div> <!-- total detail -->
						</div> <!-- col -->
					</div> <!-- row -->
				</section> <!-- account activity -->

			</div> <!-- profile wrapper -->

		</div> <!-- db-box -->
	</div> <!-- col -->
</div> <!-- db boxes -->

@endsection
