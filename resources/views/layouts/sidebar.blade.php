<ul class="nav-list">
	<li class="open-link">
		<a href="#0" class="heading">
			<i class="fas fa-arrow-circle-right open-icon"></i>
			<i class="fas fa-arrow-circle-left close-icon"></i>
			<span class="close-text">Collapse</span>
		</a>
	</li>
	<li>
		<a href="/" class="heading">
			<i class="fas fa-tachometer-alt"></i>
			Dashboard
		</a>
	</li>
	<li>
		<span class="heading">
			<i class="fas fa-building"></i>
			Companies
		</span>
		<ul class="nav-sublist">
			<li>
				<a href="/companies">View Companies</a>
			</li>
			<li>
				<a href="/companies/create">Add Company</a>
			</li>
		</ul> <!-- nav sub list -->
	</li>
	<li>
		<span class="heading">
			<i class="fas fa-briefcase"></i>
			Assets
		</span>
		<ul class="nav-sublist">
			<li>
				<a href="/assets">View Assets</a>
			</li>
			<li>
				<a href="/assets/create">Add Asset</a>
			</li>
		</ul> <!-- nav sub list -->
	</li>
	<li>
		<span class="heading">
			<i class="fas fa-file-alt"></i>
			Accounts
		</span>
		<ul class="nav-sublist">
			<li>
				<a href="/accounts">View Accounts</a>
			</li>
			<li>
				<a href="/accounts/create">Add Account</a>
			</li>
		</ul> <!-- nav sub list -->
	</li>
	<li>
		<span class="heading">
			<i class="fas fa-users"></i>
			Tenants
		</span>
		<ul class="nav-sublist">
			<li>
				<a href="/tenants">View Tenants</a>
			</li>
			<li>
				<a href="/tenants/create">Add Tenant</a>
			</li>
		</ul> <!-- nav sub list -->
	</li>
	<li>
		<span class="heading">
			<i class="fas fa-dollar-sign"></i>
			Payments
		</span>
		<ul class="nav-sublist">
			<li>
				<a href="#0">View Payments</a>
			</li>
			<li>
				<a href="#0">Add Payment</a>
			</li>
		</ul> <!-- nav sub list -->
	</li>
	<li>
		<a href="#0" class="heading">
			<i class="fas fa-chart-bar"></i>
			Reports
		</a>
	</li>
	<li>
		<span class="heading">
			<i class="fas fa-cogs"></i>
			Admin
		</span>
		<ul class="nav-sublist">
			{{-- Once we impliment the login funtion, we can remove this, as anyone seeing the sidebar, will be logged in, so there will always be an Auth::user --}}
			@if (Auth::user())
			<li>
				<a href="/users/{{Auth::user()->id}}">My Profile</a>
			</li>
			@endif
			<li>
				<a href="/users">All Users</a>
			</li>
			<li>
				<a href="/users/create">Add User</a>
			</li>
			<li>
				<a href="#0">Settings</a>
			</li>
		</ul> <!-- nav sub list -->
	</li>
</ul> <!-- nav list -->
