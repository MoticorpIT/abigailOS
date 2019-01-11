<ul class="nav-list">
	<li class="open-link">
		<div class="heading">
			<a href="#0" class="heading-link toggle-nav">
				<i class="fas fa-arrow-circle-right open-icon"></i>
				<i class="fas fa-arrow-circle-left close-icon"></i>
				<span class="close-text">Collapse</span>
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a href="/dashboard/" class="heading-link">
				<i class="fas fa-tachometer-alt heading-icon"></i>
				Dashboard
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a href="/companies/" class="heading-link">
				<i class="fas fa-building heading-icon"></i>
				Companies
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
				Assets
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
				Accounts
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
				Tenants
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
				Payments
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
				Reports
			</a>
		</div>
	</li>
	<li>
		<div class="heading">
			<a class="heading-link" data-toggle="collapse" href="#nav-sublist" role="button">
				<i class="fas fa-cogs heading-icon"></i>
				Admin
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
