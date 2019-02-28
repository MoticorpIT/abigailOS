<div class="row">
	<div class="col-md-12">
		<nav class="navbar navbar-expand-sm">
			<div class="navbar-brand" href="/">
				<a href="/">
					abigail<strong>OS</strong>
				</a>
			</div>
			<form class="form-inline search-form">
				<input class="form-control search-form-field" type="search" placeholder="Search" aria-label="Search">
				<button class="search-form-button" type="submit">
					<i class="fas fa-search"></i>
				</button>
			</form>
			<div class="profile-link-wrapper ">
				<a class="nav-link dropdown-toggle btn btn-info btn-sm profile-link" href="" id="navbarDropdownMenuLink" data-toggle="dropdown">
					<span class="profile-link-image">
						@if (auth()->user()->avatar == null)
							<img src="/media/images/default-avatar-thumb.png" alt="Default Avatar" />
						@else
						<img src="{{ auth()->user()->avatarUrl }}" alt="{{ Auth::user()->name }}s-avatar" />
						@endif
					</span>
					<span class="profile-link-username text-capitalize">
						{{ Auth::user()->name }}
					</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="/users/{{Auth::user()->id}}">
						<i class="fas fa-user-circle profile-link-icon"></i>
						My Profile
					</a>
					<a class="dropdown-item" href="/users/{{Auth::user()->id}}/edit-pw">
						<i class="fas fa-unlock-alt profile-link-icon"></i>
						Change Password
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
						@csrf
					</form>
					<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="fas fa-sign-out-alt profile-link-icon"></i>
						{{ __('Logout') }}
					</a>
				</div>
			</div> <!-- profile link wrapper -->
		</nav>
	</div>
</div>
