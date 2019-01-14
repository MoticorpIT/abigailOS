<ul class="nav-list">
	<li class="open-link">
		<div class="heading">
			<a href="#0" class="heading-link toggle-nav" data-toggle="collapse" data-target=".navbar-collapse.show">
				<i class="fas fa-arrow-circle-right open-icon heading-icon"></i>
				<i class="fas fa-arrow-circle-left close-icon heading-icon"></i>
				<span class="close-text heading-label">Collapse</span>
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a href="/dashboard/" class="heading-link">
				<i class="fas fa-tachometer-alt heading-icon"></i>
				<span class="heading-label">Dashboard</span>
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a href="/companies/" class="heading-link">
				<i class="fas fa-building heading-icon"></i>
				<span class="heading-label">Companies</span>
			</a>
			<a href="/companies/create" class="add-link btn btn-secondary btn-sm">
				<i class="fas fa-plus-square"></i>
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a href="/assets/" class="heading-link">
				<i class="fas fa-briefcase heading-icon"></i>
				<span class="heading-label">Assets</span>
			</a>
			<a href="/assets/create" class="add-link btn btn-secondary btn-sm">
				<i class="fas fa-plus-square"></i>
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a href="/accounts/" class="heading-link">
				<i class="fas fa-file-alt heading-icon"></i>
				<span class="heading-label">Accounts</span>
			</a>
			<a href="/accounts/create" class="add-link btn btn-secondary btn-sm">
				<i class="fas fa-plus-square"></i>
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a href="/tenants/" class="heading-link">
				<i class="fas fa-users heading-icon"></i>
				<span class="heading-label">Tenants</span>
			</a>
			<a href="/tenants/create" class="add-link btn btn-secondary btn-sm">
				<i class="fas fa-plus-square"></i>
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a href="/payments/" class="heading-link">
				<i class="fas fa-dollar-sign heading-icon"></i>
				<span class="heading-label">Payments</span>
			</a>
			<a href="/payments/create" class="add-link btn btn-secondary btn-sm">
				<i class="fas fa-plus-square"></i>
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a href="/reports/" class="heading-link">
				<i class="fas fa-chart-bar heading-icon"></i>
				<span class="heading-label">Reports</span>
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a class="heading-link" data-toggle="collapse" href="#nav-sublist" role="button">
				<i class="fas fa-cogs heading-icon"></i>
				<span class="heading-label">Admin</span>
		  </a>
		</div>
		<ul id="nav-sublist" class="nav-sublist collapse">
			<li>
				<a href="/users">All Users</a>
			</li>
			<li>
				<a href="/users/create">Add User</a>
			</li>
			<li>
				<a href="/users/{{Auth::user()->id}}">My Profile</a>
			</li>
			<li>
				<a href="/users/{{Auth::user()->id}}/edit-pw">Change Password</a>
			</li>
			<li>
				<a href="{{ route('logout') }}" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					<span class="sidebar-normal"> {{ __('Logout') }} </span>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
					@csrf
				</form>
			</li>
		</ul> <!-- nav sub list -->
	</li>
</ul> <!-- nav list -->
